<?php

namespace App\Domain\Prize;

use App\Domain\Prize\Interfaces\StructureGeneratorInterface;
use App\Domain\Prize\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\PrizeCreatorInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;

class PrizeCreator implements PrizeCreatorInterface
{
    /**
     * @var FactoryInterface
     */
    private FactoryInterface $prizeFactory;

    /**
     * @param FactoryInterface $prizeFactory
     */
    public function __construct(FactoryInterface $prizeFactory)
    {
        $this->prizeFactory = $prizeFactory;
    }

    /**
     * @inheritDoc
     */
    public function create(
        string $type,
        string $userName,
        StructureGeneratorInterface $structureGenerator
    ): PrizeInterface {
        $structure = $structureGenerator->generate();

        return $this->prizeFactory->create($type, $userName, $structure);
    }
}
