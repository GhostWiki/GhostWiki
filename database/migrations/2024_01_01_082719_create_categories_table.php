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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->index();
            $table->string('slug')->index();
            $table->text('name');
            $table->text('description');
            $table->integer('priority')->index();
            $table->timestamps();
            $table->integer('created_by')->index();
            $table->integer('updated_by')->index();
            $table->softDeletes();
            $table->unsignedInteger('owned_by')->index();
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
        Schema::dropIfExists('categories');
    }
};
