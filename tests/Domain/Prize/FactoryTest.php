<?php

namespace App\Tests\Domain\Prize;

use App\Domain\Prize\Factory;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Structure\Interfaces\StructureInterface;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    private const TYPE = 'type';

    private const USER_NAME = 'Some user name';

    public function testCreate(): void
    {
        $factory = new Factory();

        $structure = $this->createMock(StructureInterface::class);

        $prize = $factory->create(self::TYPE, self::USER_NAME, $structure);

        $this->assertInstanceOf(PrizeInterface::class, $prize);
        $this->assertSame(self::TYPE, $prize->getType());
        $this->assertSame(self::USER_NAME, $prize->getUserName());
        $this->assertSame($structure, $prize->getStructure());
    }
}
