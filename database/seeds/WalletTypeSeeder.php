<?php

use Illuminate\Database\Seeder;

class WalletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallet_types = [
            [
                'name' => 'savings',
                'slug' => 'savings',
                "created_at" => now()
            ],
            [
                'name' => 'investments',
                'slug' => 'investments',
                "created_at" => now()
            ],
        ];

        \App\Models\WalletType::insert($wallet_types);
    }
}
