<?php

namespace Vitkuz573\SystemResources\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Vitkuz573\SystemResources\Enums\Capacity;
use Vitkuz573\SystemResources\Resources\Ram;

class RamTest extends TestCase
{
    /** @test  */
    public function testTotal()
    {
        exec('wmic memorychip get capacity', $capacity);

        $this->assertTrue(array_sum($capacity) === (new Ram(Capacity::Byte))->total());
    }

//    public function testUsed()
//    {
//        exec('wmic memorychip get capacity', $capacity);
//        exec('wmic os get freephysicalmemory', $freePhysicalMemory);
//
//        $totalMem = array_sum($capacity);
//        $freeMem = array_sum($freePhysicalMemory) * 1024;
//
//        $this->assertTrue($totalMem - $freeMem === (new Ram(Capacity::Byte))->used());
//    }
//
//    public function testAvailable()
//    {
//        exec('wmic os get freephysicalmemory', $freePhysicalMemory);
//
//        $this->assertTrue(array_sum($freePhysicalMemory) * 1024 === (new Ram(Capacity::Byte))->available());
//    }
}
