<?php

namespace App\Controller;

use App\Entity\Annonce;

/* ************************************************************************** */

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Entity\VenteImmediate;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/* ************************************************************************** */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Annonce::class);
        $annonces = $repository->findAll();

        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'annonce' => $annonces
        ]);
    }


/**
     * @Route("annonce/create", name="create_annonce")
     * @Route("annonce/update/{id}", name="update_annonce")
     * 
     */
    public function new(Request $request, EntityManagerInterface $manager, Annonce $annonce = null): Response
    {
        // creates a task object and initializes some data for this example
        if (!$annonce) {
            $annonce = new Annonce();
        }
        /* ================================================================ */
        // formulaire de création d'une nouvelle annonce :
        $form = $this->createFormBuilder($annonce)
        ->add('IdCategorie', EntityType::class,[
            'class' => Categorie::class,
            'choice_label' => 'titre',
            'multiple' => false
        ] )
        ->add('titre', TextType::class)
        ->add('description', TextareaType::class)
        ->add('prix_depart', MoneyType::class)
        ->add('date_fin', DateType::class)
        ->add('date_debut', DateType::class)
        ->add('prix_plafond', MoneyType::class)
        ->add('vente_immediate', ChoiceType::class,[
            'choices' => [
                'oui' => true,
                'non' => false,
            ],
        ])

        ->add('save', SubmitType::class, ['label' => 'Créer votre annonce'])
            ->getForm();
        /* ================================================================ */

        // requête de récupération des données de création de l'annonce :
        $form->handleRequest($request);

        /* ================================================================ */

        //requête vers la bdd
        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setDisponible(true);
            $manager->persist($annonce);
            $manager->flush();
            return $this->redirectToRoute('annonce');
        }

        //affiche le formulaire (rendu) 
        return $this->render('annonce/createAnnonce.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);
    }
}