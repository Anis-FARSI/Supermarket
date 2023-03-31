<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig');
    }

    // #[Route('/product/{id}', name: 'app_product_by_id', requirements:['id' => '\d+'])]
    // public function productById(): Response
    // {
    //     return $this->render('product/productById.html.twig');
    // }
}