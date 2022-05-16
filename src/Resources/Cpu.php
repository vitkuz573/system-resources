<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Resources;

use Vitkuz573\SystemResources\Concerns\Frequentable;

class Cpu
{
    use Frequentable;

    public function max(): int|float
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic cpu get maxclockspeed', $maxClockSpeed);

            $this->value = (int) $maxClockSpeed[1];
        }

        return $this->convert();
    }

    public function current(): int|float
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic cpu get currentclockspeed', $currentClockSpeed);

            $this->value = (int) $currentClockSpeed[1];
        }

        return $this->convert();
    }
}
