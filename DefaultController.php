<?php

namespace Sante\BoutiqueBundle\Controller;

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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SanteBoutiqueBundle:Default:index.html.twig');
    }


}
