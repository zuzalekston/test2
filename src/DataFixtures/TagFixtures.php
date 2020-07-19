<?php
/**
 * Tag fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TagFixtures.
 */
class TagFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(30, 'tags', function () {
            $tag = new Tag();
            $tag->setText($this->faker->word);

            for ($i = 0; $i <= 3; ++$i) {
                $tag->addPhoto($this->getRandomReference('photos'));
            }

            return $tag;
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
        return [PhotoFixtures::class];
    }
}
