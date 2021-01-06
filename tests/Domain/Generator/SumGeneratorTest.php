<?php

namespace App\Tests\Domain\Generator;

use App\Domain\Generator\SumGenerator;
use PHPUnit\Framework\TestCase;

class SumGeneratorTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGenerate(): void
    {
        $generator = new SumGenerator();

        $limit = 100500;

        $this->assertNotEquals($generator->generate($limit), $generator->generate($limit));
    }

    /**
     * @throws \Exception
     */
    public function testGenerateCheckLimit(): void
    {
        $generator = new SumGenerator();

        $limit = 1;

        $this->assertSame(1, $generator->generate($limit));
    }
}
