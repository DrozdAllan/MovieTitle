<?php

namespace App\Entity;

use App\Repository\EsTranslationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EsTranslationRepository::class)
 */
class EsTranslation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Movie::class, inversedBy="esTranslation", cascade={"persist", "remove"})
     */
    private $movie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $esTitle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function getEsTitle(): ?string
    {
        return $this->esTitle;
    }

    public function setEsTitle(string $esTitle): self
    {
        $this->esTitle = $esTitle;

        return $this;
    }
}
