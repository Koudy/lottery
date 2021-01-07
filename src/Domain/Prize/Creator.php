<?php

namespace App\Domain\Prize;

use App\Domain\Prize\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\CreatorInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Structure\Interfaces\StructureGeneratorInterface;

class Creator implements CreatorInterface
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
