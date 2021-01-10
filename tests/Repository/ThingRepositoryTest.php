<?php

namespace App\Tests\Repository;

use App\Entity\Thing;
use App\Repository\ThingRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;

class ThingRepositoryTest extends TestCase
{
    public function testStore(): void
    {
        $entity = $this->createMock(Thing::class);

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
            ->with(Thing::class)
            ->willReturn($entityManager);

        $entityManager
            ->method('getClassMetadata')
            ->willReturn($this->createMock(ClassMetadata::class));

        $repository = new ThingRepository($registryManager);

        $repository->store($entity);
    }
}
