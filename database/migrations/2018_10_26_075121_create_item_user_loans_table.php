<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUserLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_user_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('end_date')->nullable(); // date - actually returned
            $table->date('expected_end_date')->nullable(); // date - supposed returned
            $table->boolean('returned')->default(false);
            $table->integer('user_id')->unsigned();
            $table->integer('item_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('item_user_loans', function (Blueprint $table) {
            // ->onDelete('cascade')
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_user_loans');
    }
}
