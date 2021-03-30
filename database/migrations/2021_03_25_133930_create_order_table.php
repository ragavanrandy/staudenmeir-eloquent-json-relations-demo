<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_no', 20);
            $table->string('vendor_ord_no', 20);
            $table->json('worklogs');
            $table->timestamps();
            $user_id = DB::connection()->getQueryGrammar()->wrap('worklogs->[]->user_id');
            $table->bigInteger('user_id', false, true)->virtualAs($user_id);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
