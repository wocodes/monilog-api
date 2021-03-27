<?php


namespace App\Repositories;


use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class TransactionRepository extends BaseRepository
{
    public $model;

    public function __construct()
    {
        $this->model = new Transaction;
        parent::__construct($this->model);
    }

}
