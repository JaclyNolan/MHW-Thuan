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
        Schema::create('laptop', function (Blueprint $table) {
            $table->increments('laptopID');
            $table->string('lName');
            $table->float('lPrice');
            $table->string('lDescription');
            $table->integer('brandID')->unsigned();
            $table->foreign('brandID')
                ->references('bID')->on('brand')
                ->onDelete('cascade');
            $table->integer('screensizeID')->unsigned();
            $table->foreign('screensizeID')
                ->references('sID')->on('screensize')
                ->onDelete('cascade');
            $table->integer('processorID')->unsigned();
            $table->foreign('processorID')
                ->references('pID')->on('processor')
                ->onDelete('cascade');
            $table->integer('vgaID')->unsigned();
            $table->foreign('vgaID')
                ->references('vID')->on('vga')
                ->onDelete('cascade');
            $table->integer('ramID')->unsigned();
            $table->foreign('ramID')
                ->references('rID')->on('ram')
                ->onDelete('cascade');
            $table->integer('colorID')->unsigned();
            $table->foreign('colorID')
                ->references('cID')->on('color')
                ->onDelete('cascade');
            $table->integer('ssdID')->unsigned();
            $table->foreign('ssdID')
                ->references('ssID')->on('ssd')
                ->onDelete('cascade');
            $table->integer('hddID')->unsigned();
            $table->foreign('hddID')
                ->references('hID')->on('hdd')
                ->onDelete('cascade');
            $table->integer('providerID')->unsigned();
            $table->foreign('providerID')
                ->references('pvID')->on('provider')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptop');
    }
};
