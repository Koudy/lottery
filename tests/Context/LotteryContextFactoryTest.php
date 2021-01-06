<?php

namespace App\Tests\Context;

use App\Context\ContextException;
use App\Context\LotteryContextFactory;
use App\Domain\Command\Context\LotteryContext;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\UserInterface;

class LotteryContextFactoryTest extends TestCase
{
    private const USER_NAME = 'Some unique user name';

    public function testCreate():void
    {
        $user = $this->createMock(UserInterface::class);
        $user
            ->method('getUsername')
            ->willReturn(self::USER_NAME);

        $factory = new LotteryContextFactory();

        $context = $factory->create($user);

        $this->assertInstanceOf(LotteryContext::class, $context);
        $this->assertSame(self::USER_NAME, $context->getUserName());
    }

    public function testCreateWhenEmptyUserName(): void
    {
        $user = $this->createMock(User::class);
        $user->setName('');

        $factory = new LotteryContextFactory();

        $this->expectException(ContextException::class);
        $this->expectExceptionMessage('User name can not be empty');

        $factory->create($user);
    }
}
