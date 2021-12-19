<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forumas', function (Blueprint $table) {
            $table->id();
            $table->string('Forumo_temos');
            $table->string('turinys');
            $table->json('Kurejo_id');
            $table->double('Reitingai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forumas');
    }
}
