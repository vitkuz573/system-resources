<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Contracts;

use Vitkuz573\SystemResources\Enums\Size;

interface Resource
{
    public function __construct(Size $unit);

    public function total(): int;

    public function used(): int;

    public function available(): int;
}
