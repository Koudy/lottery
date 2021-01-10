<?php

namespace App\Domain\Prize;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Structure\Interfaces\StructureInterface;

class Prize implements PrizeInterface
{
    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $userName;

    /**
     * @var StructureInterface
     */
    private StructureInterface $prizeStructure;

    /**
     * @param string $type
     * @param string $userName
     * @param StructureInterface $prizeStructure
     */
    public function __construct(
        string $type,
        string $userName,
        StructureInterface $prizeStructure
    ) {
        $this->type = $type;
        $this->userName = $userName;
        $this->prizeStructure = $prizeStructure;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @inheritDoc
     */
    public function getStructure(): StructureInterface
    {
        return $this->prizeStructure;
    }
}
