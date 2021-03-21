<?php


namespace App\Repositories;


use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function read()
    {
        return $this->model->all();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
