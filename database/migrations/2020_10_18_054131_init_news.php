<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title')->nullable(false);
            $table->text('message')->nullable(false);
            $table->integer('categoryId')->nullable(true)->unsigned();
            $table->boolean('private')->default(false);
            $table->string('image')->nullable(true)->default(null);
            $table->timestamps();
            $table->foreign("categoryId", "categories");
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
