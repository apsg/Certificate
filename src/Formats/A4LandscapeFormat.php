<?php

namespace Apsg\Certificate\Formats;

class A4LandscapeFormat extends Format
{
    public function __construct()
    {
        parent::__construct(self::SIZE_A4, self::LANDSCAPE);
    }
}
