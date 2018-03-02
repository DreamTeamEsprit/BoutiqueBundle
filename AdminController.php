<?php

namespace Sante\BoutiqueBundle\Controller;

use Sante\UserBundle\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Sante\UserBundle\Entity\Categorie;
use Sante\UserBundle\Entity\Commande;
use Sante\UserBundle\Entity\Panier;
use Sante\UserBundle\Entity\Produit;
use Sante\UserBundle\Entity\User;
use Sante\UserBundle\Form\CategorieType;
use Sante\UserBundle\Form\ProduitType;
use Sante\UserBundle\Form\UserType;
use Sante\UserBundle\SanteUserBundle;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller
{
    public function listeProduitAction()
    {
        $m = $this->getDoctrine()->getManager();
        $pr = $m->getRepository('SanteUserBundle:Produit')->findAll();
       // $con = $m->getConnexion();

        $table= array();
        foreach ($pr as $req){
        $r = $req->getQuantiteDispo();

        if ($r<5)
        {

            array_push($table,$req);
        }


        }
        return $this->render('SanteBoutiqueBundle:Admin:listeProduit.html.twig',
            array(
                'ev' => $pr,
                'fedi' => $table
            )
        );
    }

    public function AjoutproduitAction(Request $request)
    {
        {
            $produit = new Produit();
            $form = $this->createForm(ProduitType::class, $produit);

            $form->handleRequest($request);
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $produit->uploadProfilePicture();
                $em->persist($produit);
                $em->flush();
                return $this->redirectToRoute('listeProduit');
            }

            return $this->render('SanteBoutiqueBundle:Admin:AjouterProduit.html.twig', array('form' => $form->createView()));
        }
        // return $this->render('santeevenementBundle:evenement:ajoutevenement.html.twig', array(
        //  // ...
        // ));
    }

    public function supprimerProduitAction($id)
    {
        //instancier orm
        //nel9aw el id ela bech nfas5ouh
        $em = $this->getDoctrine()->getManager();
        $mark = $em->getRepository('SanteUserBundle:Produit')->find($id);
        $em->remove($mark);
        $em->flush();
        return $this->redirectToRoute('listeProduit');
    }


    public function modifierProduitAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $mark = $em->getRepository('SanteUserBundle:Produit')->find($id);
        $form = $this->createForm(ProduitType::class, $mark);
        if ($form->handleRequest($request)->isValid()) {
            $mark->uploadProfilePicture();
            $em->persist($mark);
            $em->flush();
            return $this->redirectToRoute('listeProduit');
        }
        return $this->render('SanteBoutiqueBundle:Admin:Modifier.html.twig', array('form' => $form->createView()));

    }



    public function listeCategorieAction()
    {
        $m = $this->getDoctrine()->getManager();
        $pr = $m->getRepository('SanteUserBundle:Categorie')->findAll();
        return $this->render('SanteBoutiqueBundle:Admin:listeCategorie.html.twig',
            array(
                'ev' => $pr,
            )
        );
    }


    public function AjoutCategorieAction(Request $request)
    {
        {
            $categorie = new Categorie();
            $form = $this->createForm(CategorieType::class, $categorie);

            $form->handleRequest($request);
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();
                return $this->redirectToRoute('listeCategorie');
            }

            return $this->render('SanteBoutiqueBundle:Admin:AjouterCategorie.html.twig', array('form' => $form->createView()));
        }
        // return $this->render('santeevenementBundle:evenement:ajoutevenement.html.twig', array(
        //  // ...
        // ));
    }


    public function modifierCategorieAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $mark = $em->getRepository('SanteUserBundle:Categorie')->find($id);
        $form = $this->createForm(CategorieType::class, $mark);
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($mark);
            $em->flush();
            return $this->redirectToRoute('listeCategorie');
        }
        return $this->render('SanteBoutiqueBundle:Admin:ModifierCategorie.html.twig', array('form' => $form->createView()));

    }


    public function supprimerCategorieAction($id)
    {
        //instancier orm
        //nel9aw el id ela bech nfas5ouh
        $em = $this->getDoctrine()->getManager();
        $mark = $em->getRepository('SanteUserBundle:Categorie')->find($id);
        $em->remove($mark);
        $em->flush();
        return $this->redirectToRoute('listeCategorie');
    }


    public function ProduitFiniAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mark = $em->getRepository('SanteUserBundle:Produit')->findAll();

        foreach ($mark as $markk) {
            if ($markk->getQuantiteDispo() == 0) {
                $em->remove($markk);
                $em->flush();

            }

        }

        return $this->redirectToRoute('Boutique');


    }



  /*  public function sendNotification(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $prod = $m->getRepository('SanteUserBundle:Notification')->findAll();

        $notification = new Notification();
        foreach ($prod as $product)
        {
            if ($product->getQuantiteDispo()==5 )
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($notification);
                $em->flush();

            }

        }

        $pr = $m->getRepository('SanteUserBundle:Notification')->findAll();
        return $this->render('SanteUserBundle::layout1.html.twig',
            array(
                'notif' => $pr,
            )
        );

    }*/



}
