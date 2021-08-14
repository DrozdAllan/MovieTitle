<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MovieRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\MovieTranslationController;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=MovieRepository::class)
 */
#[
    ApiResource(
        normalizationContext: ['groups' => ['read:MovieDetail']],
        paginationItemsPerPage: 1,
        itemOperations: [
            'GET',
            'PATCH' => [
                'security' => "is_granted('ROLE_USER')",
                'method' => 'PATCH',
                'path' => '/movies/{id}',
                'controller' => MovieTranslationController::class,
                'openapi_context' => [
                    'security' => [['apiKey' => []]],
                    'summary' => 'Add a translation for the Movie resource (requires Api Key)',
                    'description' => 'The json format will be dynamic with the front to select the right language',
                    'requestBody' => [
                        'content' => [
                            'application/merge-patch+json' => [
                                'schema' => [
                                    'type' => 'object',
                                    'properties' =>
                                    [
                                        'lang' => [
                                            'type' => 'string',
                                        ],
                                        'translatedTitle' => [
                                            'type' => 'string',
                                        ],
                                    ],
                                ],
                                'example' => [
                                    'lang' => 'fr',
                                    'translatedTitle' => 'leFrenchTitle'
                                ]
                            ],
                        ],
                    ],
                ],
            ],
        ],
        collectionOperations: [
            'GET' => [
                'openapi_context' => [
                    'summary' => 'Get a Movie from its original name'
                ]
            ],
        ]
    ),
    ApiFilter(SearchFilter::class, properties: ['title' => 'partial'])
]
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:MovieDetail', 'read:CategoryDetail'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:MovieDetail', 'read:CategoryDetail'])]
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:MovieDetail', 'read:CategoryDetail'])]
    private $synopsis;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="movies")
     */
    #[Groups(['read:MovieDetail'])]
    private $category;

    /**
     * @ORM\OneToOne(targetEntity=DeTranslation::class, mappedBy="movie", cascade={"persist", "remove"})
     */
    #[Groups(['read:MovieDetail'])]
    private $deTranslation;

    /**
     * @ORM\OneToOne(targetEntity=EnTranslation::class, mappedBy="movie", cascade={"persist", "remove"})
     */
    #[Groups(['read:MovieDetail'])]
    private $enTranslation;

    /**
     * @ORM\OneToOne(targetEntity=FrTranslation::class, mappedBy="movie", cascade={"persist", "remove"})
     */
    #[Groups(['read:MovieDetail'])]
    private $frTranslation;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDeTranslation(): ?DeTranslation
    {
        return $this->deTranslation;
    }

    public function setDeTranslation(?DeTranslation $deTranslation): self
    {
        // unset the owning side of the relation if necessary
        if ($deTranslation === null && $this->deTranslation !== null) {
            $this->deTranslation->setMovie(null);
        }

        // set the owning side of the relation if necessary
        if ($deTranslation !== null && $deTranslation->getMovie() !== $this) {
            $deTranslation->setMovie($this);
        }

        $this->deTranslation = $deTranslation;

        return $this;
    }

    public function getEnTranslation(): ?EnTranslation
    {
        return $this->enTranslation;
    }

    public function setEnTranslation(?EnTranslation $enTranslation): self
    {
        // unset the owning side of the relation if necessary
        if ($enTranslation === null && $this->enTranslation !== null) {
            $this->enTranslation->setMovie(null);
        }

        // set the owning side of the relation if necessary
        if ($enTranslation !== null && $enTranslation->getMovie() !== $this) {
            $enTranslation->setMovie($this);
        }

        $this->enTranslation = $enTranslation;

        return $this;
    }

    public function getFrTranslation(): ?FrTranslation
    {
        return $this->frTranslation;
    }

    public function setFrTranslation(?FrTranslation $frTranslation): self
    {
        // unset the owning side of the relation if necessary
        if ($frTranslation === null && $this->frTranslation !== null) {
            $this->frTranslation->setMovie(null);
        }

        // set the owning side of the relation if necessary
        if ($frTranslation !== null && $frTranslation->getMovie() !== $this) {
            $frTranslation->setMovie($this);
        }

        $this->frTranslation = $frTranslation;

        return $this;
    }
}
