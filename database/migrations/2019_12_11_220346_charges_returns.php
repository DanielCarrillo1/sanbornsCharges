<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChargesReturns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges_returns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sanborns_id');
            $table->date('date');
            $table->integer('import');
            $table->string('answer')->nullable();
            $table->integer('reference');
            $table->string('source');
            $table->string('type')->nullable();
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

    }
}
