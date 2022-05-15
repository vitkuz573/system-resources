<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Resources;

use Vitkuz573\SystemResources\Contracts\Resource;
use Vitkuz573\SystemResources\Enums\Size;
use Vitkuz573\SystemResources\Resources\Resource as BaseResource;

class Drive extends BaseResource implements Resource
{
    public function __construct(Size $unit)
    {
        parent::__construct($unit);
    }

    public function total(): int
    {
        PHP_OS !== 'WINNT' ?: exec('wmic diskdrive get size', $size);

        $this->value = array_sum($size);

        return $this->convertSize();
    }

    public function used(): int
    {
        return $this->total() - $this->available();
    }

    public function available(): int
    {
        PHP_OS !== 'WINNT' ?: exec('wmic logicaldisk get freespace', $freeSpace);

        $this->value = array_sum($freeSpace);

        return $this->convertSize();
    }
}
