<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use App\Repository\DeTranslationRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=DeTranslationRepository::class)
 */
#[
    ApiResource(
        normalizationContext: ['groups' => ['read:deTranslation']],
        paginationEnabled: false,
        itemOperations: [
            'GET' => [
                'openapi_context' => [
                    'summary' => 'hidden'
                ]
            ]
        ],
        collectionOperations: [
            'GET' => [
                'openapi_context' => [
                    'summary' => 'Get a movie from its german title'
                ]
            ]
        ]
    ),
    ApiFilter(SearchFilter::class, properties: ['title' => 'partial'])
]
class DeTranslation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Movie::class, inversedBy="deTranslation", cascade={"persist", "remove"})
     */
    #[Groups(['read:deTranslation'])] 
    private $movie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:deTranslation', 'read:MovieDetail'])] 
    private $title;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
