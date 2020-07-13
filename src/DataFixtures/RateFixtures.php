<?php
/**
 * Rate fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Rate;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class RateFixtures.
 */
class RateFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(30, 'ratings', function ($i) {
            $rate = new Rate();
            $rate->setRate($this->faker->numberBetween(0, 5));
            $rate->setUser($this->getRandomReference('users'));
            $rate->setPhoto($this->getRandomReference('photos'));

            return $rate;
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [PhotoFixtures::class, UserFixtures::class];
    }
}
