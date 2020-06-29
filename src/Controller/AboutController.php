<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AboutController
 * @package App\Controller
 * Kontroler wygenerowany za pomocą komendy php bin/console make:controller
 */
class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="about_index")
     * Funkcja stworzona przez: Maciej Moryń
     */
    public function index()
    {
        return $this->render('about/index.html.twig');
    }
}