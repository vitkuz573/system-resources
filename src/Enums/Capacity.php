<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Enums;

enum Capacity: string
{
    case Byte = 'B';
    case Kilobyte = 'KB';
    case Megabyte = 'MB';
    case Gigabyte = 'GB';
}
