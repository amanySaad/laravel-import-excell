<?php

namespace App\Services;

use App\Imports\ProductsImport;
use App\Repositories\ProductRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\ProductsUpdated;


class ProductStoreService implements Service
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
        /*upload File*/
        $file_name = $this->uploadFile($request);

        if (\Storage::exists($file_name)) {
            try {
                Excel::import(new ProductsImport, $file_name);
                event(new ProductsUpdated(ProductRepository::LIST_CACHE_KEY));
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();
                foreach ($failures as $failure) {
                    $error = $failure->errors()[0] . " at Row " . $failure->row();
                    return (['status' => false, 'message' => $error]);
                }
            }
            return (['status' => true, 'message' => 'Import successful']);
        } else {
            return (['status' => false, 'message' => 'File Not Found']);
        }


    }

    public function uploadFile($request){
        if ($file = $request->file('file')) {
            $path = $file->store('');
            return $file->hashName();
        }
    }


}
