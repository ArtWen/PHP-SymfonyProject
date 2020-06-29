<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

//Plik dodany za pomocą komendy php bin/console make:controller
class AdminPanelController extends AbstractController
{
    /**
     * @Route("/admin/panel", name="admin_panel")
     */
    public function index(ProjectRepository $projectRepository)
    {
        //napisane przez Artur Wenda
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $projects = $projectRepository->findBy([], ['date' => 'DESC']);

        return $this->render('admin_panel/index.html.twig', ['projects' =>$projects]);
    }

    /**
     * Funkcja napisana przez Artur Wenda
     * @Route("/admin/new_project", name="admin_new_project")
     */
    public function new(Request $request){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $project = new Project();
        $project ->setUser($this->getUser());
        $project ->setDate(new \DateTime());
        $form = $this->createForm("App\Form\ProjectType", $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirect("/admin/panel");
        }

        return $this->render('admin_panel\form.html.twig',[
            'form' =>$form->createView(), 'action' =>"Create new"]);
    }

    /**
     * Funkcja napisana przez Artur Wenda
     * @Route("/admin/edit_project/{id}", name="admin_edit_project")
     */
    public function Edit(Request $request, Project $project){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm("App\Form\ProjectType", $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirect("/admin/panel");
        }

        return $this->render('admin_panel\form.html.twig',[
            'form' =>$form->createView(), 'action' => "Edit"]);
    }

    /**
     * Funkcja napisana przez Artur Wenda
     * @Route("/admin/delete_project/{id}", name="admin_delete_project")
     */
    public function Delete(Project $project){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($project);
        $entityManager->flush();
        return $this->redirect("/admin/panel");
    }

    /**
     * Funkcja napisana przez Artur Wenda
     * @Route("/admin/view_project/{id}", name="admin_view_project")
     */
    public function View(Project $project){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('admin_panel\view.html.twig',[
            'project' =>$project]);
    }

}
