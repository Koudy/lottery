<?php

namespace App\DataFixtures;

use App\Entity\Thing;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ThingFixtures extends Fixture
{
    private const NAME_IRON = 'Iron';

    private const NAME_SMARTPHONE = 'Smartphone';

    private const NAME_WASHING_MACHINE = 'Washing machine';

    public function load(ObjectManager $manager)
    {
        $this->loadEntity(self::NAME_IRON, 5, $manager);
        $this->loadEntity(self::NAME_SMARTPHONE, 1, $manager);
        $this->loadEntity(self::NAME_WASHING_MACHINE, 2, $manager);
    }

    /**
     * @param string $name
     * @param int $count
     * @param ObjectManager $manager
     */
    private function loadEntity(string $name, int $count, ObjectManager $manager): void
    {
        for ($i = 0; $i < $count; $i++) {
            $thing = new Thing();

            $thing->setName($name);

            $manager->persist($thing);
            $manager->flush();
        }
    }
}
