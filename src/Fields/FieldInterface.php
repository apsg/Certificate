<?php

namespace Apsg\Certificate\Fields;

interface FieldInterface
{
    public function x(): int;

    public function y(): int;

    public function size(): int;

    public function align(): string;

    public function text(): string;
}
