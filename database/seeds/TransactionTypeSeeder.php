<?php

use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trans_types = [
            ["name" => "credit", "slug" => "credit", "created_at" => now()],
            ["name" => "debit", "slug" => "debit", "created_at" => now()],
        ];

        \App\Models\TransactionType::insert($trans_types);
    }
}
