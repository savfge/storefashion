<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('barnd_id');
            $table->foreign('barnd_id')->references('id')->on('barnds')->onUpdate('cascade')->onDelete('cascade');
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('slug');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->string('title1');
            $table->string('title2');
            $table->string('title3');
            $table->string('title4');
            $table->string('title5');
            $table->string('title6');
            $table->string('title7');
            $table->string('title8');
            $table->string('qty');
            $table->string('new');
            $table->string('staus');
            $table->string('image');
            $table->string('image2');
            $table->string('stock');
            $table->string('price');
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
        Schema::dropIfExists('prodects');
    }
}
