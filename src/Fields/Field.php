<?php

namespace Apsg\Certificate\Fields;

use InvalidArgumentException;

class Field implements FieldInterface
{
    const ALIGN_CENTER = 'C';
    const ALIGN_LEFT = 'L';
    const ALIGN_RIGHT = 'R';

    /** @var int */
    protected $positionX = 0;

    /** @var int */
    protected $positionY = 0;

    /** @var int */
    protected $fontSize = 12;

    /** @var string */
    protected $text;

    /** @var string */
    protected $align = self::ALIGN_CENTER;

    public function __construct(string $text, int $positionX = 0, int $positionY = 0, int $size = 12)
    {
        $this->text = $text;

        $this->setPosition($positionX, $positionY);
        $this->setFontSize($size);
    }

    public function setPosition(int $x, int $y) : self
    {
        if ($x < 0 || $y < 0) {
            throw  new InvalidArgumentException("Position must be positive");
        }

        $this->positionX = $x;
        $this->positionY = $y;

        return $this;
    }

    public function setFontSize(int $size) : self
    {
        if ($size < 1) {
            throw  new InvalidArgumentException("Provide valid font size");
        }

        $this->fontSize = $size;

        return $this;
    }

    public function setAlign(string $align) : self
    {
        if (!in_array($align, [
            self::ALIGN_LEFT,
            self::ALIGN_CENTER,
            self::ALIGN_RIGHT,
        ])) {
            throw new InvalidArgumentException('Wrong align definition');
        }

        $this->align = $align;

        return $this;
    }

    public function x() : int
    {
        return $this->positionY;
    }

    public function y() : int
    {
        return $this->positionY;
    }

    public function size() : int
    {
        return $this->fontSize;
    }

    public function align() : string
    {
        return $this->align;
    }

    public function text() : string
    {
        return $this->convert($this->text);
    }

    protected function convert(string $string) : string
    {
        return iconv('UTF-8', 'ISO-8859-2', $string);
    }
}
