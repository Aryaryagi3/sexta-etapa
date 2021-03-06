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
        Schema::create('books', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('title', 300);
            $table->string('author', 100);
            $table->unsignedInteger('user_id');
            $table->boolean('available')->default(true);
            $table->string('cover')->default('04b7708edaf2ea6e524f97c119238f46.jpg');
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
