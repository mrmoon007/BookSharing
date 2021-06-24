<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('isbm');
            $table->string('publish_year')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_approved')->default(0);
            $table->boolean('total_view')->default(0);
            $table->boolean('total_search')->default(0);
            $table->boolean('total_borrowed')->default(0);
            $table->string('user_id')->nullable()->index();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('translator_id')->nullable()->index();

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
        Schema::dropIfExists('books');
    }
}
