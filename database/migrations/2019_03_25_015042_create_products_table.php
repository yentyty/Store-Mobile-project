<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->integer('factory_id')->unsigned();
            $table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('promotion_id')->unsigned();
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade')->onUpdate('cascade');
            $table->smallInteger('in_stock');
            $table->integer('price');
            $table->text('image');
            $table->longText('body')->nullable();
            $table->text('color');
            $table->text('description');
            $table->string('storage', 255);
            $table->string('slug',100);
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
        Schema::dropIfExists('products');
    }
}
