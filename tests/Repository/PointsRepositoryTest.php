<?php

namespace App\Tests\Repository;

use App\Entity\Points;
use App\Repository\PointsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;

class PointsRepositoryTest extends TestCase
{
    public function testStore(): void
    {
        $entity = $this->createMock(Points::class);

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
            ->with(Points::class)
            ->willReturn($entityManager);

        $entityManager
            ->method('getClassMetadata')
            ->willReturn($this->createMock(ClassMetadata::class));

        $repository = new PointsRepository($registryManager);

        $repository->store($entity);
    }
}
