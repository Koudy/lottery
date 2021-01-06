<?php

namespace App\Domain\Price;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Price\Interfaces\TypeRandomizerInterface;

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
        $priceTypes = $this->configuration->getPriceTypes();

        return $this->itemRandomizer->provide($priceTypes);
    }
}
