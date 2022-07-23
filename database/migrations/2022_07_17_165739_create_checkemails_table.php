<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckemailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkemails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('code')->nullable();
            $table->string('verifytoken')->nullable();
            $table->integer('h')->nullable();
            $table->integer('m')->nullable();
            $table->integer('d')->nullable();
            $table->integer('expire')->nullable();


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
        Schema::dropIfExists('checkemails');
    }
}
