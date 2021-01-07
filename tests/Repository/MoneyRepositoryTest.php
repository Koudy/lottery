<?php

namespace App\Tests\Repository;

use App\Entity\Money;
use App\Repository\MoneyRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;

class MoneyRepositoryTest extends TestCase
{
    public function testStore(): void
    {
        $entity = $this->createMock(Money::class);

        $entityManager = $this->createMock(EntityManager::class);
        $entityManager
            ->expects(self::once())
            ->method('persist')
            ->with($entity);

        $entityManager
            ->expects(self::once())
            ->method('flush');

        $registryManager = $this->createMock(ManagerRegistry::class);
        $registryManager
            ->method('getManagerForClass')
            ->with(Money::class)
            ->willReturn($entityManager);

        $entityManager
            ->method('getClassMetadata')
            ->willReturn($this->createMock(ClassMetadata::class));

        $repository = new MoneyRepository($registryManager);

        $repository->store($entity);
    }
}
