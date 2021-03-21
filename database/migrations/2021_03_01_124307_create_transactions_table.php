<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_type_id');
            $table->unsignedBigInteger('transaction_category_id');
            $table->unsignedBigInteger('wallet_id')->nullable();
            $table->double('amount', 10, 2);
            $table->string('transaction_reference')->nullable();
            $table->boolean('locked')->default(0);
            $table->string('lock_duration_in_days')->nullable();
            $table->dateTime('lock_duration_end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('transaction_type_id')->references('id')->on('transaction_types')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('transaction_category_id')->references('id')->on('transaction_types')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('wallet_id')->references('id')->on('wallets')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
