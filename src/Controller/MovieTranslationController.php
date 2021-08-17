<?php

namespace App\Controller;

use App\Entity\EnTranslation;
use App\Entity\Movie;
use App\Entity\FrTranslation;
use App\Repository\MovieRepository;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]
class MovieTranslationController extends AbstractController
{

    public function __invoke(MovieRepository $movieRepository, Request $request, Movie $data): Movie
    {
        $apiRequest = $request->toArray();

        //TODO: check for every languages
        if ($apiRequest['lang'] === 'fr') {

            $frTranslation = $data->getFrTranslation();

            if ($frTranslation !== null) {
                throw new Exception('frTranslation already set');
            } else {
                $newFrenchTitle = new FrTranslation;

                $newFrenchTitle->setTitle($apiRequest['translatedTitle']);

                $data->setFrTranslation($newFrenchTitle);
            }
        }

        else if ($apiRequest['lang'] === 'en') {

            $enTranslation = $data->getEnTranslation();

            if ($enTranslation !== null) {
                throw new Exception('enTranslation already set');
            } else {
                $newEnglishTitle = new EnTranslation;

                $newEnglishTitle->setTitle($apiRequest['translatedTitle']);

                $data->setEnTranslation($newEnglishTitle);
            }
        }

        return $data;
    }
}
