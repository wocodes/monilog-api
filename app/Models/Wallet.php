<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public $fillable = ['available_balance', 'wallet_type_id'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function walletType()
    {
        return $this->belongsTo(WalletType::class);
    }
}
