<?php

namespace App\Tests\Repository;

use App\Entity\Prize;
use App\Repository\PrizeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;

class PrizeRepositoryTest extends TestCase
{
    public function testStore(): void
    {
        $entity = $this->createMock(Prize::class);

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
            ->with(Prize::class)
            ->willReturn($entityManager);

        $entityManager
            ->method('getClassMetadata')
            ->willReturn($this->createMock(ClassMetadata::class));

        $repository = new PrizeRepository($registryManager);

        $repository->store($entity);
    }
}
