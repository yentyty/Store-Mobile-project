<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factory_id')->unsigned();
            $table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title',255);
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->text('image');
            $table->string('slug', 255);
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
        Schema::dropIfExists('news');
    }
}
