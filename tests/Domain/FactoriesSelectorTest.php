<?php

namespace App\Tests\Domain;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\FactoriesSelector;
use App\Domain\Factory\MoneyFactory;
use PHPUnit\Framework\TestCase;

class FactoriesSelectorTest extends TestCase
{
    /**
     * @dataProvider factoryClassesDataProvider
     *
     * @param string $type
     * @param string $className
     */
    public function testSelect(string $type, string $className): void
    {
        $selector = $this->createSelector();

        $factory = $selector->select($type);

        $this->assertInstanceOf($className, $factory);
    }

    /**
     * @return array
     */
    public function factoryClassesDataProvider(): array
    {
        return [
            [ConfigurationInterface::PRICE_TYPE_MONEY, MoneyFactory::class],
//            [ConfigurationInterface::PRICE_TYPE_POINTS, PointsFactory::class],
//            [ConfigurationInterface::PRICE_TYPE_THING, ThingFactory::class]
        ];
    }

    /**
     * @return FactoriesSelector
     */
    private function createSelector(): FactoriesSelector
    {
        return new FactoriesSelector(
            $this->createMock(MoneyFactory::class)
        );
    }
}
