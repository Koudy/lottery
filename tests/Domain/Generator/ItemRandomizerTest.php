<?php

namespace App\Tests\Domain\Generator;

use App\Domain\Generator\ItemRandomizer;
use PHPUnit\Framework\TestCase;

class ItemRandomizerTest extends TestCase
{
    public function testProvide(): void
    {
        $prizesTypes = $this->createPrizeTypes();

        $randomizer = new ItemRandomizer();

        $type = $randomizer->provide($prizesTypes);

        $this->assertNotEquals($type, $randomizer->provide($prizesTypes));
        $this->assertContains($type, $prizesTypes);
    }

    public function testProvideWhenOneElement(): void
    {
        $type = 'type';
        $prizesTypes = [$type];

        $randomizer = new ItemRandomizer();

        $this->assertSame($type, $randomizer->provide($prizesTypes));
    }

    /**
     * @return string[]
     */
    private function createPrizeTypes(): array
    {
        $types = [];

        foreach (range(1, 20) as $number) {
            $types[] = 'type' . $number;
        }

        return $types;
    }
}
