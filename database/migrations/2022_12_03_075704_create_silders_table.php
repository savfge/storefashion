<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('silders', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('image');
            $table->string('staus');
            $table->string('en_title');
            $table->string('ar_title');
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
        Schema::dropIfExists('silders');
    }
}
