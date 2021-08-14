<?php

namespace App\Controller;

use App\Entity\FrTranslation;
use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class MovieTranslationController extends AbstractController
{

    public function __invoke(Request $request, Movie $data): Movie
    {
        $apiRequest = $request->toArray();


        //TODO: check for every languages
        if ($apiRequest['lang'] === 'fr') {

            $newFrenchTitle = new FrTranslation;

            $newFrenchTitle->setTitle($apiRequest['translatedTitle']);

            $data->setFrTranslation($newFrenchTitle);
        }

        return $data;
    }
}
