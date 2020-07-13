<?php

/**
 * Comment entity.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @ORM\Table(name="comments")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(
     *     min="1",
     *     max="20",
     * )
     */
    private $nick;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(
     *     min="1",
     *     max="30",
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $comment_text;

    /**
     * @ORM\ManyToOne(targetEntity=Photo::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function setNick(?string $nick): self
    {
        $this->nick = $nick;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCommentText(): ?string
    {
        return $this->comment_text;
    }

    public function setCommentText(string $comment_text): self
    {
        $this->comment_text = $comment_text;

        return $this;
    }

    public function getPhoto(): ?Photo
    {
        return $this->photo;
    }

    public function setPhoto(?Photo $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
