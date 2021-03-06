<?php

namespace App\Domain\Prize\Structure\Interfaces;

use App\Domain\Prize\Exception\NotAvailableException;

interface GeneratorInterface
{
    /**
     * @return StructureInterface
     *
     * @throws NotAvailableException
     */
    public function generate(): StructureInterface;
}
