<?php

namespace App\Services;

use App\Repositories\ProductRepository;


class ProductListService implements Service
{


    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function handle($request, $data = [])
    {
        return $this->productRepository->all();
    }


}
