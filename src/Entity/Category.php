<?php
/**
 * Category entity,
 */
namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ORM\Table(name="categories")
 *
 * @UniqueEntity(
 *     fields={"category"},
 * )
 *
 */
class Category
{
    /**
     * Primary key.

     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Category.
     *
     * @ORM\Column(type="string", length=30)
     */
    private $category;




    /**
     * Getter for id.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * Getter for category.
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }


    /**
     * Setter for category.
     *
     * @param string $category
     * @return $this
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

}
