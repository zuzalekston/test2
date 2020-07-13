<?php
/**
 * Category entity,.
 */

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ORM\Table(name="categories")
 *
 * @UniqueEntity(
 *     fields={"category"},
 * )
 */
class Category
{
    /**
     * Primary key.

     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Category.
     *
     * @ORM\Column(type="string", length=30)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(
     *     min="1",
     *     max="30",
     * )
     */
    private $category;

    /**
     * Getter for id.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for category.
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * Setter for category.
     *
     * @return $this
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }
}
