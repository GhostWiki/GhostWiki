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
        Schema::create('page_revisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->index();
            $table->string('name');
            $table->longText('html');
            $table->longText('text');
            $table->integer('created_by');
            $table->timestamps();
            $table->string('slug')->index();
            $table->string('book_slug')->index();
            $table->string('type')->default('version')->index();
            $table->longText('markdown');
            $table->string('summary')->nullable();
            $table->integer('revision_number')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_revisions');
    }
};
