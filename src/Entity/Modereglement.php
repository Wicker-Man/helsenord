<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ModereglementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModereglementRepository::class)]
#[ApiResource]
class Modereglement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $code;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\OneToMany(mappedBy: 'modereglement', targetEntity: Reglement::class, orphanRemoval: true)]
    private $reglement;

    public function __construct()
    {
        $this->reglement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Reglement>
     */
    public function getReglement(): Collection
    {
        return $this->reglement;
    }

    public function addReglement(Reglement $reglement): self
    {
        if (!$this->reglement->contains($reglement)) {
            $this->reglement[] = $reglement;
            $reglement->setModereglement($this);
        }

        return $this;
    }

    public function removeReglement(Reglement $reglement): self
    {
        if ($this->reglement->removeElement($reglement)) {
            // set the owning side to null (unless already changed)
            if ($reglement->getModereglement() === $this) {
                $reglement->setModereglement(null);
            }
        }

        return $this;
    }
}
