<?php

declare(strict_types=1);

namespace Vitkuz573\SystemResources\Concerns;

use Vitkuz573\SystemResources\Enums\Frequency;

trait Frequentable
{
    protected Frequency $unit;
    protected int $value;
    protected int|float $result;

    public function __construct(Frequency $unit)
    {
        $this->unit = $unit;
    }

    abstract public function max(): int|float;

    abstract public function current(): int|float;

    final protected function convert(): int|float
    {
        $this->unit !== Frequency::Megahertz ?: $this->result = $this->value;
        $this->unit !== Frequency::Gigahertz ?: $this->result = round($this->value / 1000, 2);

        return $this->result;
    }
}
