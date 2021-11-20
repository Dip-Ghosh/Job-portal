<?php

namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    protected $model;


    public function __construct(Model $model)
    {

        $this->model = $model;

    }

    public function all()
    {
        return $this->model->where('deleted_at','=',null)->orderBy('id','desc')->paginate(10);
    }

    public function save(array $data)
    {

        return $this->model->insert($data);
    }

    public function edit($id)
    {
        return $this->model->where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return  $this->model->find($id)->delete();
    }
}
