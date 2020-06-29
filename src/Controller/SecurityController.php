<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * wygenerowane poprzez php bin/console make:auth (wybrana opcja 1 Login form authenticator)
     *
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * funkcja z poradnika przesłanego na platfornie moodle (potrzebna tylko do testów aplikacji)
     * @Route("new_user", name="new_user")
     */
    public function newUser(UserPasswordEncoderInterface $passwordEncoder)
    {
        $user=new User();
        $user->setusername('user');
        $user->setPassword($passwordEncoder->encodePassword(
            $user, 'user'));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return new Response("<html><head></head><body>dodano użytkownika</body></html>");
    }

    /**
     * funkcja z poradnika przesłanego na platfornie moodle (potrzebna tylko do testów aplikacji)
     * @Route("new_admin", name="new_admin")
     */
    public function newAdmin(UserPasswordEncoderInterface $passwordEncoder)
    {
        $user=new User();
        $user->setusername('admin');
        $user->setPassword($passwordEncoder->encodePassword(
            $user, 'admin'));
        $roles[]='ROLE_ADMIN';
        $user->setRoles($roles);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return new Response("<html><head></head><body>dodano administratora</body></html>");
    }


}
