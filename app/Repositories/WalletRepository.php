<?php


namespace App\Repositories;


use App\Models\BankAccount;
use App\Models\TransactionMode;
use App\Models\TransactionType;
use App\Models\Wallet;
use Carbon\Carbon;

class WalletRepository extends BaseRepository
{
    public $model;
    public $user;
    public $walletTypeRepository;
    public $transactionRepository;

    public function __construct(WalletTypeRepository $walletTypeRepository, TransactionRepository $transactionRepository)
    {
        $this->model = new Wallet;
        $this->user = user();
        $this->walletTypeRepository = $walletTypeRepository;
        $this->transactionRepository = $transactionRepository;

        parent::__construct($this->model);
    }

    public function create($request)
    {
        $wallet_type = $this->walletTypeRepository->model->where('name', $request->wallet_type)->first();

        $saved_wallet = $this->user->wallets->where('wallet_type_id', $wallet_type->id)->first();

        if($saved_wallet) {
            $saved_wallet = $this->update($saved_wallet, $request);
        } else {
            $saved_wallet = $this->store($wallet_type->id, $request);
        }


        // save as transaction
        return $this->logTransaction($saved_wallet, $request);
    }



    public function store($wallet_type_id, $request)
    {
        return $this->user->wallets()->create([
            "available_balance" => $request->amount,
            "wallet_type_id" => $wallet_type_id,
        ]);
    }


    public function update($saved_wallet, $request) {
        $saved_wallet->available_balance += $request->amount;
        $saved_wallet->save();

        return $saved_wallet;
    }


    public function logTransaction($wallet, $request)
    {
        $transaction_mode = TransactionMode::where('name', "card")->first();
        $transaction_type = TransactionType::where('name', "credit")->first();

        $data = [
            "transaction_type_id" => $transaction_type->id,
            "transaction_mode_id" => $transaction_mode->id,
            "amount" => $request->amount,
            "transaction_reference" => $request->reference,
            "locked" => $request->locked,
            "lock_duration_in_days" => $request->lock_duration,
            "lock_duration_end_date" => Carbon::now()->addDays($request->lock_duration),
        ];

        return $wallet->transactions()->create($data);
    }



    public function fetch($data) {
        $wallet = $this->user->wallets()->whereHas('walletType', function($q) use($data) {
                    $q->where('name', $data['name']);
                })->orderBy('created_at')->first();

        return $wallet->transactions()->select('id','amount','created_at')->get();
    }
}
