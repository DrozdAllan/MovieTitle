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
class MovieRandomizeController extends AbstractController
{

    public function __invoke(MovieRepository $movieRepository, Request $request)
    {
        $number = $request->query->get('number');

        $max = $movieRepository->count([]);

        $randomMovies = $movieRepository->findRandomByNumber($number, $max);
        // dd($number);

        return $randomMovies;
    }
}
