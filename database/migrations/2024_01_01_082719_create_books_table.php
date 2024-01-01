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
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->index();
            $table->text('description');
            $table->timestamps();
            $table->integer('created_by')->index();
            $table->integer('updated_by')->index();
            $table->integer('image_id')->nullable();
            $table->softDeletes();
            $table->unsignedInteger('owned_by')->index();
            $table->integer('default_template_id')->nullable();
            $table->text('description_html');
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
