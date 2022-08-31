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
       return cache()->remember(ProductRepository::LIST_CACHE_KEY, ProductRepository::LIST_CACHE_DURATION,function (){
            return $this->productRepository->all();
        });

    }


}
