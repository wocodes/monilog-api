<?php

use Illuminate\Database\Seeder;

class TransactionModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trans_types = [
            ["name" => "card", "slug" => "card", "created_at" => now()],
            ["name" => "ussd", "slug" => "ussd", "created_at" => now()],
        ];

        \App\Models\TransactionMode::insert($trans_types);
    }
}
