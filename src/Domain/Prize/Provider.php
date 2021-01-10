<?php

namespace App\Domain\Prize;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Prize\Exception\NotAvailableException;
use App\Domain\Prize\Exception\PrizeProviderException;
use App\Domain\Prize\Interfaces\CreatorInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Interfaces\ProviderInterface;

class Provider implements ProviderInterface
{
    /**
     * @var ConfigurationInterface
     */
    private ConfigurationInterface $configuration;

    /**
     * @var ItemRandomizerInterface
     */
    private ItemRandomizerInterface $itemRandomizer;

    /**
     * @var CreatorInterface
     */
    private CreatorInterface $creator;

    /**
     * @param ConfigurationInterface $configuration
     * @param ItemRandomizerInterface $itemRandomizer
     * @param CreatorInterface $creator
     */
    public function __construct(
        ConfigurationInterface $configuration,
        ItemRandomizerInterface $itemRandomizer,
        CreatorInterface $creator
    ) {
        $this->configuration = $configuration;
        $this->itemRandomizer = $itemRandomizer;
        $this->creator = $creator;
    }

    /**
     * @inheritDoc
     */
    public function provide(string $userName): PrizeInterface
    {
        $prizeTypes = $this->configuration->getPrizeTypes();

        for ($i = 0; $i < $this->configuration->getPrizeProvideAttemptCount(); $i++) {
            $prizeType = $this->itemRandomizer->provide($prizeTypes);
            try {
                $prize = $this->creator->create($prizeType, $userName);
            } catch (NotAvailableException) {
                continue;
            }

            return $prize;
        }

        throw new PrizeProviderException('Can\'t provide prize');
    }
}
