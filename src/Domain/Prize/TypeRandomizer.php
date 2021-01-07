<?php

namespace App\Domain\Prize;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Prize\Interfaces\TypeRandomizerInterface;

class TypeRandomizer implements TypeRandomizerInterface
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
     * @param ConfigurationInterface $configuration
     * @param ItemRandomizerInterface $itemRandomizer
     */
    public function __construct(
        ConfigurationInterface $configuration,
        ItemRandomizerInterface $itemRandomizer
    ) {
        $this->configuration = $configuration;
        $this->itemRandomizer = $itemRandomizer;
    }

    /**
     * @inheritDoc
     */
    public function provide(): string
    {
        $prizeTypes = $this->configuration->getPrizeTypes();

        return $this->itemRandomizer->provide($prizeTypes);
    }
}
