<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Concerns;

use Vitkuz573\SystemResources\Enums\Capacity;

trait Capacitable
{
    public Capacity $unit;
    protected int $value;
    protected int $result;

    public function __construct(Capacity $unit)
    {
        $this->unit = $unit;
    }

    abstract protected function total(): int|float;

    abstract protected function used(): int|float;

    abstract protected function available(): int|float;

    final protected function convert(): int|float
    {
        $this->unit !== Capacity::Byte ?: $this->result = $this->value;
        $this->unit !== Capacity::Kilobyte ?: $this->result = intval($this->value / 1024);
        $this->unit !== Capacity::Megabyte ?: $this->result = intval($this->value / 1024 / 1024);
        $this->unit !== Capacity::Gigabyte ?: $this->result = intval($this->value / 1024 / 1024 / 1024);

        return $this->result;
    }
}
