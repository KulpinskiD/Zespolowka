<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_companies')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->string('from');
            $table->string('number_of_facture');
            $table->timestamps();
            $table->foreign('id_companies')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outers');
    }
}
