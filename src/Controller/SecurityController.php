<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login", methods={"POST"})
     */
    public function login(): Response
    {

        $user = $this->getUser();

        $cookie = Cookie::create('foo')
            ->withValue('bar')
            ->withSecure(true);


        $response = new JsonResponse(
            data: [
                'username' => $user->getUserIdentifier(),
                'roles' => $user->getRoles()
            ]
        );

        $response->headers->setCookie($cookie);

        return $response;
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
