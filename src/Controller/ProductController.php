<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function allProduct(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        //dd($products);
        return $this->render('product/product.html.twig', [
            'products' => $products
        ]);
    }

    #[Route('/product/{id}', name: 'app_product_by_id', requirements:['id' => '\d+'])]
    public function productById($id, ProductRepository $productRepository): Response
    {
        $productsById = $productRepository->find($id);
        //dd($productsById);
        return $this->render('product/productById.html.twig', [
            'productsById' => $productsById
        ]);
    }
}