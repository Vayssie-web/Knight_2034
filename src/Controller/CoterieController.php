<?php

namespace App\Controller;

use App\Entity\Coterie;
use App\Form\CoterieType;
use App\Repository\CoterieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coterie")
 */
class CoterieController extends AbstractController
{
    /**
     * @Route("/", name="coterie_index", methods={"GET"})
     */
    public function index(CoterieRepository $coterieRepository): Response
    {
        return $this->render('coterie/index.html.twig', [
            'coteries' => $coterieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="coterie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $coterie = new Coterie();
        $form = $this->createForm(CoterieType::class, $coterie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coterie);
            $entityManager->flush();

            return $this->redirectToRoute('coterie_index');
        }

        return $this->render('coterie/new.html.twig', [
            'coterie' => $coterie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coterie_show", methods={"GET"})
     */
    public function show(Coterie $coterie): Response
    {
        return $this->render('coterie/show.html.twig', [
            'coterie' => $coterie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="coterie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Coterie $coterie): Response
    {
        $form = $this->createForm(CoterieType::class, $coterie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coterie_index');
        }

        return $this->render('coterie/edit.html.twig', [
            'coterie' => $coterie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coterie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Coterie $coterie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coterie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coterie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('coterie_index');
    }
}
