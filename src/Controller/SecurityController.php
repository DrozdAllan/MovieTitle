<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="app_register", methods={"POST"})
     */
    public function register(Request $request,  UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent());

        $user = new User();

        $user->setUsername($data->username);
        // encode the plain password
        $user->setPassword(
            $passwordHasher->hashPassword($user, $data->password)
        );

        // $user->setRoles(['ROLE_ADMIN']);
        $em->persist($user);
        $em->flush();

        return new JsonResponse(null, response::HTTP_OK);
    }

    /**
     * @Route("/decodeJWT", name="decodeJWT", methods={"POST"})
     */
    public function decodeJWT(Request $request, JWTEncoderInterface $jWTEncoder): Response
    {
        $JWT = json_decode($request->getContent());

        $data = ($JWT->JWT);

        $decodedData = $jWTEncoder->decode($data);

        $response = $decodedData['apiKey'];

        return new JsonResponse($response, response::HTTP_OK);
    }

    /**
     * @Route("/login", name="app_login", methods={"POST"})
     */
    public function login(): Response
    {

        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/", name="app_redirection")
     */
    public function redirection()
    {
        // redirects to the "vue" route
        return $this->redirectToRoute('vue', ['vueRouting' => '']);
    }
}
