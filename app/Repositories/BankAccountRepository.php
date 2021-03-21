<?php


namespace App\Repositories;

use App\Models\BankAccount;

class BankAccountRepository extends BaseRepository
{
    public $model;

    public function __construct()
    {
        $this->model = new BankAccount();
        parent::__construct($this->model);
    }

    public function create($request)
    {
        return user()->bank_account()->create($request->all());
    }
}
