<?php

namespace App\Domain\Configuration;

interface ConfigurationInterface
{
    public const PRICE_TYPE_MONEY = 'money';

    public const PRICE_TYPE_POINTS = 'points';

    public const PRICE_TYPE_THING = 'thing';

    /**
     * @return string[]
     */
    public function getPriceTypes(): array;

    /**
     * @return string
     */
    public function getCurrency(): string;

    /**
     * @return int
     */
    public function getMoneyLimit(): int;
}
