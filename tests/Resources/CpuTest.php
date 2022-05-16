<?php

namespace Vitkuz573\SystemResources\Tests\Resources;

use Vitkuz573\SystemResources\Enums\Frequency;
use Vitkuz573\SystemResources\Resources\Cpu;
use PHPUnit\Framework\TestCase;

class CpuTest extends TestCase
{
    /** @test */
    public function testMax()
    {
        exec('wmic cpu get maxclockspeed', $maxClockSpeed);

        $this->assertTrue((int) $maxClockSpeed[1] === (new Cpu(Frequency::Megahertz))->max());
    }

//    public function testCurrent()
//    {
//        exec('wmic cpu get currentclockspeed', $currentClockSpeed);
//
//        $this->assertTrue((int) $currentClockSpeed[1] === (new Cpu(Frequency::Megahertz))->current());
//    }
}
