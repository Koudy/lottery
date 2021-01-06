<?php

namespace App\Tests\Domain\Generator;

use App\Domain\Generator\ItemRandomizer;
use PHPUnit\Framework\TestCase;

class ItemRandomizerTest extends TestCase
{
    public function testProvide(): void
    {
        $pricesTypes = $this->createPriceTypes();

        $randomizer = new ItemRandomizer();

        $type = $randomizer->provide($pricesTypes);

        $this->assertNotEquals($type, $randomizer->provide($pricesTypes));
        $this->assertContains($type, $pricesTypes);
    }

    public function testProvideWhenOneElement(): void
    {
        $type = 'type';
        $pricesTypes = [$type];

        $randomizer = new ItemRandomizer();

        $this->assertSame($type, $randomizer->provide($pricesTypes));
    }

    /**
     * @return string[]
     */
    private function createPriceTypes(): array
    {
        $types = [];

        foreach (range(1, 20) as $number) {
            $types[] = 'type' . $number;
        }

        return $types;
    }
}
