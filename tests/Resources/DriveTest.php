<?php

namespace Vitkuz573\SystemResources\Tests\Resources;

use Vitkuz573\SystemResources\Enums\Capacity;
use Vitkuz573\SystemResources\Resources\Drive;
use PHPUnit\Framework\TestCase;

class DriveTest extends TestCase
{
    /** @test  */
    public function testTotal()
    {
        exec('wmic diskdrive get size', $size);

        $this->assertTrue(array_sum($size) === (new Drive(Capacity::Byte))->total());
    }

//    public function testUsed()
//    {
//        exec('wmic diskdrive get size', $size);
//        exec('wmic logicaldisk get freespace', $freeSpace);
//
//        $totalDrive = array_sum($size);
//        $availableDrive = array_sum($freeSpace);
//
//        $this->assertTrue($totalDrive - $availableDrive === (new Drive(Capacity::Byte))->used());
//    }
//
//    public function testAvailable()
//    {
//        exec('wmic logicaldisk get freespace', $freeSpace);
//
//        $this->assertTrue(array_sum($freeSpace) === (new Drive(Capacity::Byte))->available());
//    }
}
