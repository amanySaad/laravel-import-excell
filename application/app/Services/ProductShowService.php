<?php

namespace App\Services;

use App\Repositories\ProductRepository;


class ProductShowService implements Service
{


    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function handle($request)
    {
        return $this->productRepository->find($request['product_id']);
    }


}
