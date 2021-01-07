<?php

namespace App\Domain\Prize\Structure;

use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;

class Money implements PrizeStructureInterface
{
    public const PARAMETER_NAME_SUM = 'sum';

    public const PARAMETER_NAME_CURRENCY = 'currency';

    /**
     * @var int
     */
    private int $sum;

    /**
     * @var string
     */
    private string $currency;

    /**
     * @param int $sum
     * @param string $currency
     */
    public function __construct(int $sum, string $currency)
    {
        $this->sum = $sum;
        $this->currency = $currency;
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            self::PARAMETER_NAME_SUM => $this->sum,
            self::PARAMETER_NAME_CURRENCY => $this->currency
        ];
    }
}
