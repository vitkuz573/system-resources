<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Resources;

use Vitkuz573\SystemResources\Contracts\Resource;
use Vitkuz573\SystemResources\Enums\Size;
use Vitkuz573\SystemResources\Resources\Resource as BaseResource;

class Ram extends BaseResource implements Resource
{
    public function __construct(Size $unit)
    {
        parent::__construct($unit);
    }

    public function total(): int
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic memorychip get capacity', $capacity);

            $this->value = array_sum($capacity);
        }

        dd($this);

        return $this->convertSize();
    }

    public function used(): int
    {
        return $this->total() - $this->available();
    }

    public function available(): int
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic os get freephysicalmemory', $freePhysicalMemory);

            $this->value = array_sum($freePhysicalMemory) * 1024;
        }

        return $this->convertSize();
    }
}
