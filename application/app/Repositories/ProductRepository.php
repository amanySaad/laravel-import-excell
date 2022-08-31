<?php
namespace App\Repositories;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Collection
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Collection
     */
    public function find($id): ? Collection
    {
        return $this->model->where('id', $id)->get();
    }

}
