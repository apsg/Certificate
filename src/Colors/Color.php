<?php

namespace Apsg\Certificate\Colors;

class Color implements ColorInterface
{
    /** @var int */
    protected $r;

    /** @var int */
    protected $g;

    /** @var int */
    protected $b;

    public function __construct(int $r, int $g, int $b)
    {
        if (! $this->isValidValue($r)) {
            throw new InvalidColorValueException('invalid red value');
        }
        $this->r = $r;

        if (! $this->isValidValue($g)) {
            throw new InvalidColorValueException('invalid green value');
        }
        $this->g = $g;

        if (! $this->isValidValue($b)) {
            throw new InvalidColorValueException('invalid blue value');
        }
        $this->b = $b;
    }

    public function r(): int
    {
        return $this->r;
    }

    public function g(): int
    {
        return $this->g;
    }

    public function b(): int
    {
        return $this->b;
    }

    protected function isValidValue(int $value): bool
    {
        return $value >= 0 && $value < 256;
    }
}
