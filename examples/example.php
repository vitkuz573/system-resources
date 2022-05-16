<?php

declare(strict_types=1);

include 'vendor/autoload.php';

use Vitkuz573\SystemResources\Enums\Capacity;
use Vitkuz573\SystemResources\Enums\Frequency;
use Vitkuz573\SystemResources\Resources\Cpu;
use Vitkuz573\SystemResources\Resources\Drive;
use Vitkuz573\SystemResources\Resources\Ram;

echo PHP_EOL;

$ram = new Ram(Capacity::Megabyte);

echo 'RAM' . PHP_EOL . PHP_EOL;
echo 'Total: ' . $ram->total() . ' ' . $ram->unit->value . PHP_EOL;
echo 'Used: ' . $ram->used() . ' ' . $ram->unit->value . PHP_EOL;
echo 'Available: ' . $ram->available() . ' ' . $ram->unit->value . PHP_EOL;

echo PHP_EOL;

$drive = new Drive(Capacity::Megabyte);

echo 'Drive' . PHP_EOL . PHP_EOL;
echo 'Total: ' . $drive->total() . ' ' . $drive->unit->value . PHP_EOL;
echo 'Used: ' . $drive->used() . ' ' . $drive->unit->value . PHP_EOL;
echo 'Available: ' . $drive->available() . ' ' . $drive->unit->value . PHP_EOL;

echo PHP_EOL;

$cpu = new Cpu(Frequency::Megahertz);

echo 'CPU' . PHP_EOL . PHP_EOL;
echo 'Max: ' . $cpu->max() . ' ' .  $cpu->unit->value . PHP_EOL;
echo 'Current: ' . $cpu->current() . ' ' . $cpu->unit->value . PHP_EOL;

echo PHP_EOL;
