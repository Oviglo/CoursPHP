<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=160)
     * @Assert\Length(
     *      min = 2,
     *      max = 160,
     *      minMessage = "Le titre doit être plus grand que {{ limit }} caractères",
     *      maxMessage = "Le titre doit être plus petit que {{ limit }} caractères",
     *      allowEmptyString = false
     * )
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $dateCreate;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $published;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $difficulty;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateUpdate;

    /**
     * @var ?Image
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade="all", orphanRemoval=true)
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $image;

    /**
     * @var ?User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $user;

    /**
     * @var bool
     */
    private $deleteImage;

    public function __construct()
    {
        $this->dateCreate = new \DateTime();
    }

    /**
     * @return bool
     */
    public function getDeleteImage()
    {
        return $this->deleteImage;
    }

    public function setDeleteImage(bool $deleteImage)
    {
        $this->deleteImage = $deleteImage;
        if ($deleteImage) {
            $this->image = null;
        }

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title.
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of dateCreate.
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set the value of dateCreate.
     *
     * @param \DateTime $dateCreate
     *
     * @return self
     */
    public function setDateCreate(\DateTime $dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get the value of published.
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set the value of published.
     *
     * @param bool $published
     *
     * @return self
     */
    public function setPublished(bool $published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get the value of content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content.
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of difficulty.
     *
     * @return int
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty.
     *
     * @param int $difficulty
     *
     * @return self
     */
    public function setDifficulty(int $difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(?\DateTimeInterface $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->dateUpdate = new \DateTime();
    }

    /**
     * Get the value of image.
     *
     * @return ?Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image.
     *
     * @param ?Image $image
     *
     * @return self
     */
    public function setImage(?Image $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return ?User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param ?User $user
     *
     * @return self
     */
    public function setUser(?User $user)
    {
        $this->user = $user;

        return $this;
    }
}
