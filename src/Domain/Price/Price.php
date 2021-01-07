<?php

namespace App\Domain\Price;

use App\Domain\Price\Interfaces\PriceInterface;
use App\Domain\Price\Structure\Interfaces\PriceStructureInterface;

class Price implements PriceInterface
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
     * @var PriceStructureInterface
     */
    private PriceStructureInterface $priceStructure;

    /**
     * @param string $type
     * @param string $userName
     * @param PriceStructureInterface $priceStructure
     */
    public function __construct(
        string $type,
        string $userName,
        PriceStructureInterface $priceStructure
    ) {
        $this->type = $type;
        $this->userName = $userName;
        $this->priceStructure = $priceStructure;
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
    public function getStructure(): PriceStructureInterface
    {
        return $this->priceStructure;
    }
}
