<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReglementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReglementRepository::class)]
#[ApiResource]
class Reglement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $numero;

    #[ORM\Column(type: 'integer')]
    private $annee;

    #[ORM\Column(type: 'date')]
    private $dateReglement;

    #[ORM\ManyToOne(targetEntity: Patient::class, inversedBy: 'reglement')]
    #[ORM\JoinColumn(nullable: false)]
    private $patient;

    #[ORM\Column(type: 'string', length: 255)]
    private $modeReglement;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numPiece;

    #[ORM\Column(type: 'float')]
    private $montant;

    #[ORM\Column(type: 'string', length: 255)]
    private $observation;

    #[ORM\ManyToOne(targetEntity: Modereglement::class, inversedBy: 'reglement')]
    #[ORM\JoinColumn(nullable: false)]
    private $modereglement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDateReglement(): ?\DateTimeInterface
    {
        return $this->dateReglement;
    }

    public function setDateReglement(\DateTimeInterface $dateReglement): self
    {
        $this->dateReglement = $dateReglement;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getModeReglement(): ?string
    {
        return $this->modeReglement;
    }

    public function setModeReglement(string $modeReglement): self
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    public function getNumPiece(): ?string
    {
        return $this->numPiece;
    }

    public function setNumPiece(?string $numPiece): self
    {
        $this->numPiece = $numPiece;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }
}
