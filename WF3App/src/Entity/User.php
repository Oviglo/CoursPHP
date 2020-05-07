<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="user")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ArticleScore", mappedBy="user", orphanRemoval=true)
     */
    private $articleScores;

    public function __construct()
    {
        // crée un nouvel objet ArrayCollection par défaut pour éviter les erreurs d'appel de méthode sur une valeur nulle
        $this->articles = new ArrayCollection();
        $this->articleScores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    /**
     * @return ArrayCollection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param ArrayCollection $articles
     *
     * @return self
     */
    public function setArticles(ArrayCollection $articles)
    {
        $this->articles = $articles;

        return $this;
    }

    /**
     * @return Collection|ArticleScore[]
     */
    public function getArticleScores(): Collection
    {
        return $this->articleScores;
    }

    public function addArticleScore(ArticleScore $articleScore): self
    {
        if (!$this->articleScores->contains($articleScore)) {
            $this->articleScores[] = $articleScore;
            $articleScore->setUser($this);
        }

        return $this;
    }

    public function removeArticleScore(ArticleScore $articleScore): self
    {
        if ($this->articleScores->contains($articleScore)) {
            $this->articleScores->removeElement($articleScore);
            // set the owning side to null (unless already changed)
            if ($articleScore->getUser() === $this) {
                $articleScore->setUser(null);
            }
        }

        return $this;
    }
}
