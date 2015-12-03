<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemoTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_transaction_a', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('demo_transaction_b', function(Blueprint $table){
            $table->increments('id');
            $table->integer('transaction_a_id')->default(0)->comment('table demo_transaction_a add id');
            $table->timestamps();
        });
        Schema::connection('mysql2')->create('demo_transaction_c', function(Blueprint $table){
            $table->increments('id');
            $table->integer('transaction_a_id')->default(0)->comment('table demo_transaction_a add id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('demo_transaction_a');
        Schema::drop('demo_transaction_b');
        Schema::connection('mysql2')->drop('demo_transaction_c');
    }
}
