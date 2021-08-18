<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MovieRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
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
        paginationEnabled: false,
        itemOperations: [
            'GET' => [
                'method' => 'GET',
                'path' => '/movies/{slug}',
                'openapi_context' => [
                    'summary' => 'Retrieves a movie resource from its slug',
                ],
            ],
            'PATCH' => [
                'security' => "is_granted('ROLE_USER')",
                'method' => 'PATCH',
                'path' => '/movies/{slug}',
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
                    'summary' => 'hidden'
                ]
            ],
        ]
    ),
    ApiFilter(SearchFilter::class, properties: ['slug' => 'exact'])
]
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[
        ApiProperty(identifier: false),
        Groups(['read:MovieDetail', 'read:CategoryDetail'])
    ]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[
        Groups(['read:MovieDetail', 'read:CategoryDetail', 'read:translation']),
    ]
    private $originalTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[
        ApiProperty(identifier: true),
        Groups(['read:translation'])
    ]
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:MovieDetail', 'read:CategoryDetail', 'read:translation'])]
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

    /**
     * @ORM\OneToOne(targetEntity=ItTranslation::class, mappedBy="movie", cascade={"persist", "remove"})
     */
    #[Groups(['read:MovieDetail'])]
    private $itTranslation;

    /**
     * @ORM\OneToOne(targetEntity=EsTranslation::class, mappedBy="movie", cascade={"persist", "remove"})
     */
    #[Groups(['read:MovieDetail'])]
    private $esTranslation;

    /**
     * @ORM\OneToOne(targetEntity=JaTranslation::class, mappedBy="movie", cascade={"persist", "remove"})
     */
    #[Groups(['read:MovieDetail'])]
    private $jaTranslation;

    /**
     * @ORM\OneToOne(targetEntity=ZhTranslation::class, mappedBy="movie", cascade={"persist", "remove"})
     */
    #[Groups(['read:MovieDetail'])]
    private $zhTranslation;

    /**
     * @ORM\OneToOne(targetEntity=RuTranslation::class, mappedBy="movie", cascade={"persist", "remove"})
     */
    #[Groups(['read:MovieDetail'])]
    private $ruTranslation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $releaseDate;


    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOriginalTitle(): ?string
    {
        return $this->originalTitle;
    }

    public function setOriginalTitle(string $originalTitle): self
    {
        $this->originalTitle = $originalTitle;

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

    public function getItTranslation(): ?ItTranslation
    {
        return $this->itTranslation;
    }

    public function setItTranslation(?ItTranslation $itTranslation): self
    {
        // unset the owning side of the relation if necessary
        if ($itTranslation === null && $this->itTranslation !== null) {
            $this->itTranslation->setMovie(null);
        }

        // set the owning side of the relation if necessary
        if ($itTranslation !== null && $itTranslation->getMovie() !== $this) {
            $itTranslation->setMovie($this);
        }

        $this->itTranslation = $itTranslation;

        return $this;
    }

    public function getEsTranslation(): ?EsTranslation
    {
        return $this->esTranslation;
    }

    public function setEsTranslation(?EsTranslation $esTranslation): self
    {
        // unset the owning side of the relation if necessary
        if ($esTranslation === null && $this->esTranslation !== null) {
            $this->esTranslation->setMovie(null);
        }

        // set the owning side of the relation if necessary
        if ($esTranslation !== null && $esTranslation->getMovie() !== $this) {
            $esTranslation->setMovie($this);
        }

        $this->esTranslation = $esTranslation;

        return $this;
    }

    public function getJaTranslation(): ?JaTranslation
    {
        return $this->jaTranslation;
    }

    public function setJaTranslation(?JaTranslation $jaTranslation): self
    {
        // unset the owning side of the relation if necessary
        if ($jaTranslation === null && $this->jaTranslation !== null) {
            $this->jaTranslation->setMovie(null);
        }

        // set the owning side of the relation if necessary
        if ($jaTranslation !== null && $jaTranslation->getMovie() !== $this) {
            $jaTranslation->setMovie($this);
        }

        $this->jaTranslation = $jaTranslation;

        return $this;
    }

    public function getZhTranslation(): ?ZhTranslation
    {
        return $this->zhTranslation;
    }

    public function setZhTranslation(?ZhTranslation $zhTranslation): self
    {
        // unset the owning side of the relation if necessary
        if ($zhTranslation === null && $this->zhTranslation !== null) {
            $this->zhTranslation->setMovie(null);
        }

        // set the owning side of the relation if necessary
        if ($zhTranslation !== null && $zhTranslation->getMovie() !== $this) {
            $zhTranslation->setMovie($this);
        }

        $this->zhTranslation = $zhTranslation;

        return $this;
    }

    public function getRuTranslation(): ?RuTranslation
    {
        return $this->ruTranslation;
    }

    public function setRuTranslation(?RuTranslation $ruTranslation): self
    {
        // unset the owning side of the relation if necessary
        if ($ruTranslation === null && $this->ruTranslation !== null) {
            $this->ruTranslation->setMovie(null);
        }

        // set the owning side of the relation if necessary
        if ($ruTranslation !== null && $ruTranslation->getMovie() !== $this) {
            $ruTranslation->setMovie($this);
        }

        $this->ruTranslation = $ruTranslation;

        return $this;
    }

    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }
}
