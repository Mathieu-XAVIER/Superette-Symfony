<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/shop', name: 'app_shop')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo_produits = $doctrine->getRepository(Product::class);
        $produits = $repo_produits->findAll();
        return $this->render('shop/index.html.twig', [
            'produits' => $produits,
        ]);
    }
}
