<?php

namespace App\Context;

use App\Domain\Command\Context\LotteryContext;
use Symfony\Component\Security\Core\User\UserInterface;

class LotteryContextFactory
{
    /**
     * @param UserInterface $user
     * @return LotteryContext
     * @throws ContextException
     */
    public function create(UserInterface $user): LotteryContext
    {
        $userName = $user->getUsername();

        if (empty($userName)) {
            throw new ContextException('User name can not be empty');
        }

        return new LotteryContext($userName);
    }
}
