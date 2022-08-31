<?php

namespace App\Http\Controllers;

use App\Services\ProductListService;
use App\Services\ProductShowService;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Responders\ProductListApiResponder;
use App\Responders\ProductShowApiResponder;
use Illuminate\Http\Request;
use App\Http\Requests\ProductShowRequest;
use App\Http\Requests\ProductImportRequest;
use App\Responders\ProductStoreApiResponder;
use App\Services\ProductStoreService;

class ProductsController
{

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param ProductListService $service
     * @param ProductListApiResponder $responder
     * @return ResourceCollection
     */
    public function index(Request $request, ProductListService $service, ProductListApiResponder $responder) :ResourceCollection
    {
        return $responder->setResponse($service->handle($request))->respond();
    }

    /**
     * Show product.
     * @param Request $request
     * @param ProductShowService $service
     * @param ProductShowApiResponder $responder
     * @return ResourceCollection
     */
    public function show(ProductShowRequest $request, ProductShowService $service, ProductShowApiResponder $responder) :ResourceCollection
    {
        return $responder->setResponse($service->handle($request->validated()))->respond();
    }

    /**
     * Upload Files and import to database .
     * @param ProductImportRequest $request
     * @param ProductStoreService $service
     * @param ProductStoreApiResponder $responder
     * @return ResourceCollection
     */
    public function store(ProductImportRequest $request, ProductStoreService $service, ProductStoreApiResponder $responder) : ResourceCollection
    {
        return $responder->setResponse($service->handle($request))->respond();
    }



}
