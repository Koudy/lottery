<?php

namespace App\Domain\Prize\Structure;

use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;
use App\Domain\Prize\Structure\Interfaces\ThingNamesProviderInterface;
use App\Domain\Prize\Structure\Interfaces\ThingProviderInterface;

class ThingGenerator implements GeneratorInterface
{
    /**
     * @var ThingNamesProviderInterface
     */
    private ThingNamesProviderInterface $thingNamesProvider;

    /**
     * @var ItemRandomizerInterface
     */
    private ItemRandomizerInterface $itemRandomizer;

    /**
     * @var ThingProviderInterface
     */
    private ThingProviderInterface $thingProvider;

    public function __construct(
        ThingNamesProviderInterface $thingNamesProvider,
        ItemRandomizerInterface $itemRandomizer,
        ThingProviderInterface $thingProvider
    ) {
        $this->thingNamesProvider = $thingNamesProvider;
        $this->itemRandomizer = $itemRandomizer;
        $this->thingProvider = $thingProvider;
    }

    /**
     * @inheritDoc
     */
    public function generate(): PrizeStructureInterface
    {
        $names = $this->thingNamesProvider->provide();

        $name = $this->itemRandomizer->provide($names);

        return $this->thingProvider->provide($name);
    }
}
