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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('isbn');
            $table->integer('total_page');
            $table->date('release_date');
            $table->text('book_description');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('publisher_id');
            $table->integer('book_cost');
            $table->integer('total_stock');
            $table->integer('total_sold')->default('0');
            $table->string('book_cover');
            $table->timestamps();

            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
