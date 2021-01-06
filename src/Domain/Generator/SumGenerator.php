<?php

namespace App\Domain\Generator;

use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use Exception;

class SumGenerator implements SumGeneratorInterface
{
    /**
     * @param int $limit
     * @return int
     * @throws Exception
     */
    public function generate(int $limit): int
    {
        return random_int(1, $limit);
    }
}
