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
        Schema::create('ssd', function (Blueprint $table) {
            $table->increments('ssID');
            $table->string('ssName');
            $table->string('ssSize');
            $table->integer('ssSpeed');
            $table->string('ssType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ssd');
    }
};
