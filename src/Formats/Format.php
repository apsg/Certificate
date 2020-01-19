<?php

namespace Apsg\Certificate\Formats;

use InvalidArgumentException;

class Format implements FormatInterface
{
    const SIZE_A3 = 'a3';
    const SIZE_A4 = 'a4';
    const SIZE_A5 = 'a5';

    const PORTRAIT = 'P';
    const LANDSCAPE = 'L';

    const STANDARD_SIZES = [
        self::SIZE_A3 => [297, 420],
        self::SIZE_A4 => [210, 297],
        self::SIZE_A5 => [148, 210],
    ];

    /** @var string */
    protected $size = self::SIZE_A4;

    /** @var string */
    protected $orientation = self::PORTRAIT;

    public function __construct(string $size, string $orientation)
    {
        $this->size = $size;
        $this->orientation = $orientation;
    }

    public function width() : int
    {
        if ($this->orientation === self::PORTRAIT) {
            return $this->getDimensions($this->size)[0];
        }

        if ($this->orientation === self::LANDSCAPE) {
            return $this->getDimensions($this->size)[1];
        }

        return 0;
    }

    public function height() : int
    {
        if ($this->orientation === self::PORTRAIT) {
            return $this->getDimensions($this->size)[1];
        }

        if ($this->orientation === self::LANDSCAPE) {
            return $this->getDimensions($this->size)[0];
        }

        return 0;
    }

    public function orientation() : string
    {
        return $this->orientation;
    }

    public function size() : string
    {
        return $this->size;
    }

    protected function getDimensions(string $size)
    {
        if (!array_key_exists(strtolower($size), self::STANDARD_SIZES)) {
            throw new InvalidArgumentException('Unknown size');
        }

        return self::STANDARD_SIZES[strtolower($size)];
    }
}
