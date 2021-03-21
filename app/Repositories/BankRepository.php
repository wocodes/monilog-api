<?php


namespace App\Repositories;


use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;

class BankRepository extends BaseRepository
{

    public $model;

    public function __construct()
    {
        $this->model = new Bank;
        parent::__construct($this->model);
    }

    public function read()
    {
        return parent::read(); // TODO: Change the autogenerated stub
    }
}