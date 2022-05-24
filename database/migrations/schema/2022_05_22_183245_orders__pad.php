<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_pad', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('fk_waiter');
            $table->unsignedBigInteger('fk_table');
            $table->float('total_price');
            $table->boolean('status');

            $table->foreign('fk_waiter')->references('id')->on('waiters');
            $table->foreign('fk_table')->references('id')->on('tables');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_pad');
    }
};
