<?php

namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements WriteAbleInterface, ReadAbleInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model::active()->orders()->get();
    }

    public function save(array $data)
    {
        return $this->model::create($data);
    }

    public function getOne($id)
    {
        return $this->getId($id);
    }

    private function getId($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->getId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->getId($id)->delete();
    }

}
