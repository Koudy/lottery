<?php

namespace App\Domain\Price;

use App\Domain\Price\Interfaces\StructureGeneratorInterface;
use App\Domain\Price\Interfaces\FactoryInterface;
use App\Domain\Price\Interfaces\PriceCreatorInterface;
use App\Domain\Price\Interfaces\PriceInterface;

class PriceCreator implements PriceCreatorInterface
{
    /**
     * @var FactoryInterface
     */
    private FactoryInterface $priceFactory;

    /**
     * @param FactoryInterface $priceFactory
     */
    public function __construct(FactoryInterface $priceFactory)
    {
        $this->priceFactory = $priceFactory;
    }

    /**
     * @inheritDoc
     */
    public function create(
        string $type,
        string $userName,
        StructureGeneratorInterface $structureGenerator
    ): PriceInterface {
        $structure = $structureGenerator->generate();

        return $this->priceFactory->create($type, $userName, $structure);
    }
}
