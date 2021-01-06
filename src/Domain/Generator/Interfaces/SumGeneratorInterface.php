<?php

namespace App\Domain\Generator\Interfaces;

interface SumGeneratorInterface
{
    public function generate(int $limit): int;
}
