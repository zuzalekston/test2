<?php
/**
 * Comment fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


/**
 * Class CommentFixtures.
 */

class CommentFixtures extends AbstractBaseFixtures implements  DependentFixtureInterface
{

    /**
     * Load.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(30, 'comments', function ($i) {
            $comment = new Comment();
            $comment->setNick($this->faker->firstName);
            $comment->setEmail($this->faker->email);
            $comment->setCommentText($this->faker->sentence);
            $comment->setPhoto($this->getRandomReference('photos'));

            return $comment;
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
