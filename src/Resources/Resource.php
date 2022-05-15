<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Resources;

use Vitkuz573\SystemResources\Enums\Size;

abstract class Resource
{
    protected Size $unit;
    protected int $value;
    protected int $result;

    public function __construct(Size $unit)
    {
        $this->unit = $unit;
    }

    protected function convertSize(): int|float
    {
        $this->unit !== Size::Byte ?: $this->result = $this->value;
        $this->unit !== Size::Kilobyte ?: $this->result = intval($this->value / 1024);
        $this->unit !== Size::Megabyte ?: $this->result = intval($this->value / 1024 / 1024);
        $this->unit !== Size::Gigabyte ?: $this->result = intval($this->value / 1024 / 1024 / 1024);

        return $this->result;
    }
}
