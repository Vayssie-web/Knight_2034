<?php

namespace App\Controller;

use App\Entity\Knight;
use App\Form\KnightType;
use App\Repository\KnightRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/knight", name="knight_")
 */
class KnightController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(KnightRepository $knightRepository): Response
    {
        return $this->render('knight/index.html.twig', [
            'knights' => $knightRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        if($this->getUser()->getKnight() !== null){
            throw new AccessDeniedException();
        }
        $knight = new Knight();
        $form = $this->createForm(KnightType::class, $knight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $knight->setUserKnight($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($knight);
            $entityManager->flush();

            return $this->redirectToRoute('knight_index');
        }

        return $this->render('knight/new.html.twig', [
            'knight' => $knight,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Knight $knight): Response
    {
        return $this->render('knight/show.html.twig', [
            'knight' => $knight,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Knight $knight): Response
    {
        if($knight->getUserKnight() !== $this->getUser()){
            throw new AccessDeniedException();
        }
        $form = $this->createForm(KnightType::class, $knight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('knight_index');
        }

        return $this->render('knight/edit.html.twig', [
            'knight' => $knight,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, Knight $knight): Response
    {
        if ($this->isCsrfTokenValid('delete'.$knight->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($knight);
            $entityManager->flush();
        }

        return $this->redirectToRoute('knight_index');
    }
}
