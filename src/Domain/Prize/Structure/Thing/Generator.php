<?php

namespace App\Domain\Prize\Structure\Thing;

use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Prize\Exception\NotAvailableException;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Prize\Structure\Interfaces\StructureInterface;
use App\Domain\Prize\Structure\Thing\Interfaces\NamesProviderInterface;
use App\Domain\Prize\Structure\Thing\Interfaces\ProviderInterface;

class Generator implements GeneratorInterface
{
    /**
     * @var NamesProviderInterface
     */
    private NamesProviderInterface $thingNamesProvider;

    /**
     * @var ItemRandomizerInterface
     */
    private ItemRandomizerInterface $itemRandomizer;

    /**
     * @var ProviderInterface
     */
    private ProviderInterface $thingProvider;

    public function __construct(
        NamesProviderInterface $thingNamesProvider,
        ItemRandomizerInterface $itemRandomizer,
        ProviderInterface $thingProvider
    ) {
        $this->thingNamesProvider = $thingNamesProvider;
        $this->itemRandomizer = $itemRandomizer;
        $this->thingProvider = $thingProvider;
    }

    /**
     * @inheritDoc
     */
    public function generate(): StructureInterface
    {
        $names = $this->thingNamesProvider->provide();

        if (empty($names)) {
            throw new NotAvailableException('No items left');
        }

        $name = $this->itemRandomizer->provide($names);

        return $this->thingProvider->provide($name);
    }
}
