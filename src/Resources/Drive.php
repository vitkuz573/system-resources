<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Resources;

use Vitkuz573\SystemResources\Concerns\Capacitable;

class Drive
{
    use Capacitable;

    public function total(): int|float
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic diskdrive get size', $size);

            $this->value = array_sum($size);
        }

        return $this->convert();
    }

    public function used(): int|float
    {
        return $this->total() - $this->available();
    }

    public function available(): int|float
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic logicaldisk get freespace', $freeSpace);

            $this->value = array_sum($freeSpace);
        }

        return $this->convert();
    }
}
