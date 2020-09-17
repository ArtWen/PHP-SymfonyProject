<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

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
        $user->setEmail("user@user");
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
        $user->setEmail("admin@admin");
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return new Response("<html><head></head><body>dodano administratora</body></html>");
    }

    /**
     * funkcja dodana przez Macieja Morynia
     * @Route("login", name="security_login")
     */
    public function goToLogin(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('index');
        }

        return $this->render('security/login.html.twig');
    }

    /**
     * funkcja dodana przez Macieja Morynia
     * @Route("register", name="security_register")
     */
    public function goToRegister(UserPasswordEncoderInterface $passwordEncoder, Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('index');
        }

        $showError = false;
        $form = $this->createForm(RegisterType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $password = $data['password'];
            $c_password = $data['confirm_password'];
            $showError = $c_password != $password;
            if (!$showError) {
                $user = new User();
                $user->setUsername($data['username']);
                $user->setEmail($data['email']);
                $user->setPassword($passwordEncoder->encodePassword(
                    $user, $password));

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->render('security/register_success.html.twig');
            }
        }

        return $this->render('security/register.html.twig',[
            'registerForm' => $form->createView(),
            'showError' => $showError
        ]);
    }

}
