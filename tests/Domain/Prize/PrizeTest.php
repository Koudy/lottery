<?php

namespace App\Tests\Domain\Prize;

use App\Domain\Prize\Prize;
use App\Domain\Prize\Structure\Interfaces\StructureInterface;
use PHPUnit\Framework\TestCase;

class PrizeTest extends TestCase
{
    private const TYPE = 'type';

    private const USER_NAME = 'Some user name';

    public function testCreateObject(): void
    {
        $structure = $this->createMock(StructureInterface::class);

        $prize = new Prize(self::TYPE, self::USER_NAME, $structure);

        $this->assertSame(self::TYPE, $prize->getType());
        $this->assertSame(self::USER_NAME, $prize->getUserName());
        $this->assertSame($structure, $prize->getStructure());
    }
}
