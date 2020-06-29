<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/projects", name="projects")
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
     */
    public function projectShow(Project $project)
    {
        return $this->render('projects/project_show.html.twig', ['project' => $project]);
    }
}