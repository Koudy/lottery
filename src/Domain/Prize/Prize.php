<?php

namespace App\Domain\Prize;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;

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
     * @var PrizeStructureInterface
     */
    private PrizeStructureInterface $prizeStructure;

    /**
     * @param string $type
     * @param string $userName
     * @param PrizeStructureInterface $prizeStructure
     */
    public function __construct(
        string $type,
        string $userName,
        PrizeStructureInterface $prizeStructure
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
    public function getStructure(): PrizeStructureInterface
    {
        return $this->prizeStructure;
    }
}
