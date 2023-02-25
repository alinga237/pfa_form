<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $login;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mail;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $psw;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: formulaire::class)]
    private $formulaire;

    public function __construct()
    {
        $this->formulaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPsw(): ?string
    {
        return $this->psw;
    }

    public function setPsw(?string $psw): self
    {
        $this->psw = $psw;

        return $this;
    }

    /**
     * @return Collection<int, formulaire>
     */
    public function getFormulaire(): Collection
    {
        return $this->formulaire;
    }

    public function addFormulaire(formulaire $formulaire): self
    {
        if (!$this->formulaire->contains($formulaire)) {
            $this->formulaire[] = $formulaire;
            $formulaire->setUser($this);
        }

        return $this;
    }

    public function removeFormulaire(formulaire $formulaire): self
    {
        if ($this->formulaire->removeElement($formulaire)) {
            // set the owning side to null (unless already changed)
            if ($formulaire->getUser() === $this) {
                $formulaire->setUser(null);
            }
        }

        return $this;
    }
}
