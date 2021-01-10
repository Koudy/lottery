<?php

namespace App\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;

class Thing implements PrizeStructureInterface
{
    public const PARAMETER_NAME_ID = 'id';

    public const PARAMETER_NAME_NAME = 'name';

    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            self::PARAMETER_NAME_ID => $this->id,
            self::PARAMETER_NAME_NAME => $this->name
        ];
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
