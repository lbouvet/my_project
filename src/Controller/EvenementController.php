<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement/add", name="evenement_add")
     */
    public function add(): Response
    {
        $e = new Evenement();

        $form = $this->createForm(EvenementType::class, $e);

        return $this->render('evenement/add.html.twig', [
            'eventForm' => $form->createView(),
        ]);
    }
}
