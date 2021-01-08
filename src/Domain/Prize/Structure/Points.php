<?php

namespace App\Domain\Prize\Structure;

use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;

class Points implements PrizeStructureInterface
{
    public const PARAMETER_NAME_SUM = 'sum';

    /**
     * @var int
     */
    private int $sum;

    /**
     * @param int $sum
     */
    public function __construct(int $sum)
    {
        $this->sum = $sum;
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            self::PARAMETER_NAME_SUM => $this->sum,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return sprintf('%s points', $this->sum);
    }
}
