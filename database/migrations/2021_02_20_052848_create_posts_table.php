<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("uuid")->unique();
            $table->string("image");
            $table->string("title");
            $table->longText("description");
            $table->integer("see")->default(0);
            $table->date("publish");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("writer_id")->nullable();
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("writer_id")->references("id")->on("writers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
