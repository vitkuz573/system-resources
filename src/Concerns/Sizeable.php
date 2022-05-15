<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Concerns;

use Vitkuz573\SystemResources\Enums\Size;

trait Sizeable
{
    protected Size $unit;
    protected int $value;
    protected int $result;

    public function __construct(Size $unit)
    {
        $this->unit = $unit;
    }

    abstract public function total(): int;

    abstract public function used(): int;

    abstract public function available(): int;

    final protected function convert(): int|float
    {
        $this->unit !== Size::Byte ?: $this->result = $this->value;
        $this->unit !== Size::Kilobyte ?: $this->result = intval($this->value / 1024);
        $this->unit !== Size::Megabyte ?: $this->result = intval($this->value / 1024 / 1024);
        $this->unit !== Size::Gigabyte ?: $this->result = intval($this->value / 1024 / 1024 / 1024);

        return $this->result;
    }
}
