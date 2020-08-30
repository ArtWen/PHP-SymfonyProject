<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProjectController
 * @package App\Controller
 * Kontroler wygenerowany za pomocą komendy php bin/console make:controller
 */

class ProjectController extends AbstractController
{
    /**
     * @Route("/projects", name="projects")
     * Funkcja stworzona przez: Maciej Moryń
     */
    public function index()
    {
        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();
        return $this->render('projects/index.html.twig', [
            'projects' => $projects,
            'controller_name' => 'ProjectController',
        ]);
    }

    /**
     * @Route("/projects/{id}",  name="projects_project")
     * Funkcja stworzona przez: Maciej Moryń
     */
    public function projectShow(Project $project)
    {
        return $this->render('projects/project_show.html.twig', ['project' => $project]);
    }

    /**
     * @Route("/search",  name="projects_search")
     * Funkcja stworzona przez: Artur Wenda
     */
    public function projectSearch(Request $request){
        $form = $this->createForm("App\Form\ProjectSearchType");
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchQuery = $form->get('search_query')->getData();
            $projects = $this->getDoctrine()->getRepository(Project::class)->findBySearchQuery($searchQuery);

            return $this ->render('projects/project_search.html.twig', ['form' =>$form->createView(), 'projects' => $projects, 'query' => $searchQuery]);
        }
        return $this ->render('projects/project_search.html.twig', ['form' =>$form->createView()]);
    }

}