<?php

namespace Vitkuz573\SystemResources\Resources;

use Vitkuz573\SystemResources\Concerns\Frequenable;

class Cpu
{
    use Frequenable;

    public function max(): int|float
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic cpu get maxclockspeed', $maxClockSpeed);

            $this->value = $maxClockSpeed[1];
        }

        return $this->convert();
    }

    public function current(): int|float
    {
        if (PHP_OS === 'WINNT') {
            exec('wmic cpu get currentclockspeed', $currentClockSpeed);

            $this->value = $currentClockSpeed[1];
        }

        return $this->convert();
    }
}
