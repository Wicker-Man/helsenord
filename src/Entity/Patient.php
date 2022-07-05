<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
#[ApiResource]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $age;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    private $genre;

    #[ORM\Column(type: 'string', length: 255)]
    private $tel;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $etatCivil;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomConjoint;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienParente;

    #[ORM\Column(type: 'integer')]
    private $nbrEnfant;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $taille;

    #[ORM\Column(type: 'integer')]
    private $poids;

    #[ORM\Column(type: 'string', length: 255)]
    private $groupeSanguin;

    #[ORM\Column(type: 'string', length: 255)]
    private $profession;

    #[ORM\Column(type: 'string', length: 255)]
    private $identifiantUniaue;

    #[ORM\Column(type: 'string', length: 255)]
    private $priseenCharge;

    #[ORM\Column(type: 'string', length: 255)]
    private $assureur;

    #[ORM\Column(type: 'string', length: 255)]
    private $medecinTraitant;

    #[ORM\Column(type: 'date')]
    private $datePremierRdv;

    #[ORM\Column(type: 'date')]
    private $dateDernierRdv;

    #[ORM\Column(type: 'string', length: 255)]
    private $keyword;

    #[ORM\Column(type: 'string', length: 255)]
    private $regimeCnam;

    #[ORM\Column(type: 'date')]
    private $dateValidite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $qualite;

    #[ORM\ManyToOne(targetEntity: Nationalite::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $nationalite;

    #[ORM\ManyToOne(targetEntity: Domaine::class)]
    private $domaine;

    #[ORM\ManyToOne(targetEntity: Assureur::class, inversedBy: 'patients')]
    #[ORM\JoinColumn(nullable: false)]
    private $Assureur;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: Rdv::class, orphanRemoval: true)]
    private $rdvs;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: Consultation::class, orphanRemoval: true)]
    private $consultation;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: Reglement::class, orphanRemoval: true)]
    private $reglement;

    public function __construct()
    {
        $this->rdvs = new ArrayCollection();
        $this->consultation = new ArrayCollection();
        $this->reglement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
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

    public function getEtatCivil(): ?string
    {
        return $this->etatCivil;
    }

    public function setEtatCivil(string $etatCivil): self
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    public function getNomConjoint(): ?string
    {
        return $this->nomConjoint;
    }

    public function setNomConjoint(string $nomConjoint): self
    {
        $this->nomConjoint = $nomConjoint;

        return $this;
    }

    public function getLienParente(): ?string
    {
        return $this->lienParente;
    }

    public function setLienParente(string $lienParente): self
    {
        $this->lienParente = $lienParente;

        return $this;
    }

    public function getNbrEnfant(): ?int
    {
        return $this->nbrEnfant;
    }

    public function setNbrEnfant(int $nbrEnfant): self
    {
        $this->nbrEnfant = $nbrEnfant;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getGroupeSanguin(): ?string
    {
        return $this->groupeSanguin;
    }

    public function setGroupeSanguin(string $groupeSanguin): self
    {
        $this->groupeSanguin = $groupeSanguin;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getIdentifiantUniaue(): ?string
    {
        return $this->identifiantUniaue;
    }

    public function setIdentifiantUniaue(string $identifiantUniaue): self
    {
        $this->identifiantUniaue = $identifiantUniaue;

        return $this;
    }

    public function getPriseenCharge(): ?string
    {
        return $this->priseenCharge;
    }

    public function setPriseenCharge(string $priseenCharge): self
    {
        $this->priseenCharge = $priseenCharge;

        return $this;
    }

    public function getAssureur(): ?string
    {
        return $this->assureur;
    }

    public function setAssureur(string $assureur): self
    {
        $this->assureur = $assureur;

        return $this;
    }

    public function getMedecinTraitant(): ?string
    {
        return $this->medecinTraitant;
    }

    public function setMedecinTraitant(string $medecinTraitant): self
    {
        $this->medecinTraitant = $medecinTraitant;

        return $this;
    }

    public function getDatePremierRdv(): ?\DateTimeInterface
    {
        return $this->datePremierRdv;
    }

    public function setDatePremierRdv(\DateTimeInterface $datePremierRdv): self
    {
        $this->datePremierRdv = $datePremierRdv;

        return $this;
    }

    public function getDateDernierRdv(): ?\DateTimeInterface
    {
        return $this->dateDernierRdv;
    }

    public function setDateDernierRdv(\DateTimeInterface $dateDernierRdv): self
    {
        $this->dateDernierRdv = $dateDernierRdv;

        return $this;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function setKeyword(string $keyword): self
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function getRegimeCnam(): ?string
    {
        return $this->regimeCnam;
    }

    public function setRegimeCnam(string $regimeCnam): self
    {
        $this->regimeCnam = $regimeCnam;

        return $this;
    }

    public function getDateValidite(): ?\DateTimeInterface
    {
        return $this->dateValidite;
    }

    public function setDateValidite(\DateTimeInterface $dateValidite): self
    {
        $this->dateValidite = $dateValidite;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(string $qualite): self
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?Nationalite $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(?Domaine $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * @return Collection<int, Rdv>
     */
    public function getRdvs(): Collection
    {
        return $this->rdvs;
    }

    public function addRdv(Rdv $rdv): self
    {
        if (!$this->rdvs->contains($rdv)) {
            $this->rdvs[] = $rdv;
            $rdv->setPatient($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): self
    {
        if ($this->rdvs->removeElement($rdv)) {
            // set the owning side to null (unless already changed)
            if ($rdv->getPatient() === $this) {
                $rdv->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Consultation>
     */
    public function getConsultation(): Collection
    {
        return $this->consultation;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultation->contains($consultation)) {
            $this->consultation[] = $consultation;
            $consultation->setPatient($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultation->removeElement($consultation)) {
            // set the owning side to null (unless already changed)
            if ($consultation->getPatient() === $this) {
                $consultation->setPatient(null);
            }
        }

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
            $reglement->setPatient($this);
        }

        return $this;
    }

    public function removeReglement(Reglement $reglement): self
    {
        if ($this->reglement->removeElement($reglement)) {
            // set the owning side to null (unless already changed)
            if ($reglement->getPatient() === $this) {
                $reglement->setPatient(null);
            }
        }

        return $this;
    }
}
