<?php

namespace App\Http\Controllers;

use App\Repositories\WalletRepository;
use Illuminate\Http\Request;

class SavingsLogController extends Controller
{

    private $walletRepository;

    public function __construct(WalletRepository $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }



    public function store(Request $request)
    {
        $response = $this->walletRepository->create($request);

        return $this->successResponse($response, 'Savings logged successfully', "Created");
    }



    public function index()
    {
        $data = ["name" => "savings"];
        $response = $this->walletRepository->fetch($data);

        return $this->successResponse($response, "Savings list fetched");
    }

}
