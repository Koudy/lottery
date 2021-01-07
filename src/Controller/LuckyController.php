<?php

namespace App\Controller;

use App\Context\LotteryContextFactory;
use App\Domain\Command\LotteryCommand;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class LuckyController extends AbstractController
{
    /**
     * @param UserInterface $user
     * @param LotteryContextFactory $lotteryContextFactory
     * @param LotteryCommand $command
     * @return Response
     * @throws \App\Context\ContextException
     */
    public function index(
        UserInterface $user,
        LotteryContextFactory $lotteryContextFactory,
        LotteryCommand $command
    ): Response {
        $context = $lotteryContextFactory->create($user);

        $command->execute($context);

        return $this->render('lucky/prize.html.twig', [
            'prizeDescription' => $context->getPrize()->getStructure()->getDescription(),
        ]);
    }
}
