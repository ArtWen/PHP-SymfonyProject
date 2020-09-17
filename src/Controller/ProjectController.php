<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Project;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
     * Funkcja stworzona przez: Maciej Moryń oraz Artur Wenda
     */
    public function projectShow(Project $project, Request $request)
    {
        $comment = new Comment();
        $comment->setAuthor($this->getUser());
        $comment->setDate(new \DateTime());
        $comment->setProject($project);
        $form = $this->createForm("App\Form\CommentType", $comment);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            return $this->redirectToRoute('projects_project', ['id' => $project->getId()]);
        }

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

    /**
     * Funkcja tworząca formę dodania komentarza do projektu
     * Funkcja stworzona przez: Artur Wenda
     */
    public function createCommentForm(Project $p){
        $form = $this->createForm("App\Form\CommentType");

        return $this->render("projects/comment_form.html.twig", ['form' => $form->createView()]);
    }

    /**
     * Funkcja pazwalająca na usunięcie komentarza
     * Funkcja stworzona przez: Artur Wenda
     *
     * @Route("/delete_comment/{id}", name="delete_comment")
     */
    public function deleteComment(Comment $c){
        if ($c->getAuthor() !== $this->getUser()) {
            $this->denyAccessUnlessGranted('ROLE_ADMIN');
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($c);
        $entityManager->flush();
        return $this->redirectToRoute('projects_project', ['id' => $c->getProject()->getId()]);
    }


}