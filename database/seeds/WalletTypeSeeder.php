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
            ],
            [
                'name' => 'investments',
                'slug' => 'investments',
            ],
        ];

        \App\Models\WalletType::insert($wallet_types);
    }
}
