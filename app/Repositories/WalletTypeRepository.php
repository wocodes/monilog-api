<?php


namespace App\Repositories;


use App\Models\WalletType;
use Illuminate\Database\Eloquent\Model;

class WalletTypeRepository extends BaseRepository
{

    public $model;

    public function __construct()
    {
        $this->model = new WalletType;
        parent::__construct($this->model);
    }
}
