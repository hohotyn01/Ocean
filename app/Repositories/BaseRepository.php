<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseInterface;

class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->setModel($model);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function update(array $data)
    {
        return $this->model->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function where(string $column, $value)
    {
        return $this->model->where($column, $value)->first();
    }

    public function permissionDelete(int $id, string $column, int $column_id)
    {
        return $this->model
            ->where('id', $id)
            ->where($column, $column_id)
            ->delete();
    }

    public function firstOrCreate(array $data)
    {
        return $this->model->firstOrCreate($data);
    }

    public function updateOrCreate(array $data, array $updateData)
    {
        return $this->model->updateOrCreate($data, $updateData);
    }

    public function findWithRelation(int $id, string $relation)
    {
        return $this->model->with($relation)->find($id);
    }

    public function findWithRelations(int $id, array $relations)
    {
        return $this->model->with($relations)->find($id);
    }

    public function setModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }
}
