<?php


namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    public function create(array $data);

    public function find(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function where(string $column, $value);

    public function setModel(Model $model);
}
