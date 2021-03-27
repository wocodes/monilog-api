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
        $user = user();
        $saved_account = $user->bank_account()->firstOrCreate($request->all());

        $user->setup_complete = 1;
        $user->save();

        return $saved_account;
    }
}
