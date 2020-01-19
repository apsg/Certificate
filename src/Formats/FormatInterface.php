<?php

namespace Apsg\Certificate\Formats;

interface FormatInterface
{
    public function width(): int;

    public function height(): int;

    public function orientation(): string;

    public function size(): string;
}
