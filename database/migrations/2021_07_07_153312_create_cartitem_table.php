<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartitem', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('proid');
            $table->integer('quantity');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('days');
            $table->float('totalPrice');
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
        Schema::dropIfExists('cartitem');
    }
}
