<?php

namespace App\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Interfaces\ThingFactoryInterface;

class ThingFactory implements ThingFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $id, string $name): Thing
    {
        return (new Thing($id, $name));
    }
}
