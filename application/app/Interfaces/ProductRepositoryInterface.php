<?php
namespace App\Interfaces;

use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param array $attributes
     * @return Collection
     */
    public function create(array $attributes): Collection;

    /**
     * @param $id
     * @return Collection
     */
    public function find($id): ? Collection;
}
