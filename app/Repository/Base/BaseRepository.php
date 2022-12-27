<?php

namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Base\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param  Model  $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function create(array $attributes): mixed
    {
        return $this->model->create($attributes);
    }

    /**
     * @param  array  $attributes
     * @param  int  $id
     * @return mixed
     */
    public function update(array $attributes, int $id): object
    {
        return tap($this->model->find($id))->update($attributes);
    }

    /**
     * @param  int  $id
     * @param  array  $with
     * @return mixed
     */
    public function find(int $id, $with = []): mixed
    {
        return $this->model->with($with)->find($id);
    }

    /**
     * @param  array  $data
     * @param  array  $with
     * @param  string  $orderBy
     * @param  string  $sortBy
     * @return mixed
     */
    public function findBy(array $data, array $with = [], string $orderBy = 'id', string $sortBy = 'asc'): mixed
    {
        return $this->model->where($data)->with($with)->orderBy($orderBy, $sortBy)->get();
    }

    /**
     * @param  array  $data
     * @param  array  $with
     * @param  array  $withCount
     * @return mixed
     */
    public function findOneBy(array $data, array $with = [], array $withCount = []): mixed
    {
        return $this->model->where($data)->with($with)->withCount($withCount)->first();
    }

    /**
     * @param  int  $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->find($id)->delete();
    }

    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function insert(array $attributes): mixed
    {
        return $this->model->query()->insert($attributes);
    }

    /**
     * @param  array  $columns
     * @param  array  $with
     * @param  string  $orderBy
     * @param  string  $sortBy
     * @return Collection
     */
    public function all(array $columns = ['*'], array $with = [], string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->with($with)->orderBy($orderBy, $sortBy)->get($columns);
    }


}