<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $fillable = [
        "user_id",
        "wallet_id",
        "transaction_type_id",
        "transaction_mode_id",
        "amount",
        "locked",
        "lock_duration_in_days",
        "lock_duration_end_date"
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
