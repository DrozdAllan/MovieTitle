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
        normalizationContext: ['groups' => ['read:translation']],
        paginationEnabled: false,
        itemOperations: [
            'GET' => [
                'openapi_context' => [
                    'summary' => 'hidden'
                ]
            ],
        ],
        collectionOperations: [
            'GET' => [
                'openapi_context' => [
                    'summary' => 'Get a movie from its german title'
                ]
            ],
        ]
    ),
    ApiFilter(SearchFilter::class, properties: ['deTitle' => 'partial'])
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
    #[Groups(['read:translation'])]
    private $movie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:translation', 'read:MovieDetail'])]
    private $deTitle;

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

    public function getDeTitle(): ?string
    {
        return $this->deTitle;
    }

    public function setDeTitle(string $deTitle): self
    {
        $this->deTitle = $deTitle;

        return $this;
    }
}
