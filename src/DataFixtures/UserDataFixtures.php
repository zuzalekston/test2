<?php
/**
 * UserData fixtures.
 */
namespace App\DataFixtures;

use App\Entity\UserData;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class UserDataFixtures
 * @package App\DataFixtures
 */

class UserDataFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */

    public function loadData(ObjectManager $manager): void
    {
        /*
        $this->createMany(13, 'users_data', function ($i) {
            $user = new UserData();
            $user->setFirstName($this->faker->firstName);
            $user->setLastName($this->faker->lastName);
            $user->setLogin($this->faker->firstName);
            $user->setUser($this->getRandomReference('users'));

            return $user;
        });
        $manager->flush();
        */
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }

}
