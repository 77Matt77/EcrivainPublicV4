<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_de_la_voie = null;

    #[ORM\Column(length: 100)]
    private ?string $voie = null;

    #[ORM\Column(length: 10)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 100)]
    private ?string $ville = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Contact $contact = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Facture $facture = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Prestation $prestation = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroDeLaVoie(): ?string
    {
        return $this->numero_de_la_voie;
    }

    public function setNumeroDeLaVoie(string $numero_de_la_voie): static
    {
        $this->numero_de_la_voie = $numero_de_la_voie;

        return $this;
    }

    public function getVoie(): ?string
    {
        return $this->voie;
    }

    public function setVoie(string $voie): static
    {
        $this->voie = $voie;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $Contact): static
    {
        $this->contact = $Contact;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $Facture): static
    {
        $this->facture = $Facture;

        return $this;
    }

    public function getPrestation(): ?Prestation
    {
        return $this->prestation;
    }

    public function setPrestation(?Prestation $Prestation): static
    {
        $this->prestation = $Prestation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $User): static
    {
        $this->user = $User;

        return $this;
    }
}
