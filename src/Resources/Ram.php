<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Resources;

use Vitkuz573\SystemResources\Concerns\Capacitable;

class Ram
{
    use Capacitable;

    public function total(): int|float
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic memorychip get capacity', $capacity);

            $this->value = array_sum($capacity);
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
            exec('wmic os get freephysicalmemory', $freePhysicalMemory);

            $this->value = array_sum($freePhysicalMemory) * 1024;
        }

        return $this->convert();
    }
}
