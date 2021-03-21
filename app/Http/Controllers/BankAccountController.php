<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Repositories\BankAccountRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BankAccountController extends Controller
{

    public $bankAccountRepo;

    public function __construct(BankAccountRepository $bankAccountRepository)
    {
        $this->bankAccountRepo = $bankAccountRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $account = $this->bankAccountRepo->create($request);

        return \response()->json(['data' => $account, 'message' => 'Successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param BankAccount $bankAccount
     * @return Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BankAccount $bankAccount
     * @return Response
     */
    public function edit(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param BankAccount $bankAccount
     * @return Response
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BankAccount $bankAccount
     * @return Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        //
    }
}
