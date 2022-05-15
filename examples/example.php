<?php

declare(strict_types=1);

include 'vendor/autoload.php';

use Vitkuz573\SystemResources\Enums\Size;
use Vitkuz573\SystemResources\Resources\Drive;
use Vitkuz573\SystemResources\Resources\Ram;

echo PHP_EOL;

$ram = new Ram(Size::Megabyte);

echo 'RAM' . PHP_EOL . PHP_EOL;
echo 'Total: ' . $ram->total() . ' MB' . PHP_EOL;
echo 'Used: ' . $ram->used() . ' MB' . PHP_EOL;
echo 'Available: ' . $ram->available() . ' MB' . PHP_EOL;

echo PHP_EOL;

$drive = new Drive(Size::Megabyte);

echo 'Drive' . PHP_EOL . PHP_EOL;
echo 'Total: ' . $drive->total() . ' MB' . PHP_EOL;
echo 'Used: ' . $drive->used() . ' MB' . PHP_EOL;
echo 'Available: ' . $drive->available() . ' MB' . PHP_EOL;

echo PHP_EOL;
