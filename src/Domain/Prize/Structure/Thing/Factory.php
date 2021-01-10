<?php

namespace App\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\Interfaces\FactoryInterface;

class Factory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $id, string $name): Thing
    {
        return (new Thing($id, $name));
    }
}
