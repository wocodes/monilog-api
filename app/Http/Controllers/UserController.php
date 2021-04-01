<?php

namespace App\Http\Controllers;

use App\Repositories\WalletRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $walletRepository;

    public function __construct(WalletRepository $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }



    public function fetchDashboardStat()
    {
        $data = ["name" => "savings"];
        $stat = [];
        $response = $this->walletRepository->fetch($data);

        $stat['savings_count'] = $response->count();
        $stat['savings_amount'] = $response[0]->wallet->available_balance;

        return $this->successResponse($stat, "Fetched dashboard stats successfully");
    }
}
