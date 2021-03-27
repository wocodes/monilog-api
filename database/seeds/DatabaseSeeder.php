<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(BankSeeder::class);
         $this->call(WalletTypeSeeder::class);
         $this->call(TransactionTypeSeeder::class);
         $this->call(TransactionModeSeeder::class);
    }
}
