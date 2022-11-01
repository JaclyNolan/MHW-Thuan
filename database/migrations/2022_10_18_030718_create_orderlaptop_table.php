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
        Schema::create('orderlaptop', function (Blueprint $table) {
            $table->integer('laptopID')->unsigned();
            $table->integer('orderID')->unsigned();
            $table->foreign('laptopID')
                ->references('laptopID')->on('laptop')
                ->onDelete('cascade');
            $table->foreign('orderID')
                ->references('oID')->on('order')
                ->onDelete('cascade');
            $table->integer('olOldPrice');
            $table->float('olQuanity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderlaptop');
    }
};
