<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
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
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $content;

    public function __construct()
    {
        $this->dateCreate = new \DateTime();
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
}
