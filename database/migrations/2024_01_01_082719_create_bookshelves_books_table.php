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
        Schema::create('bookshelves_books', function (Blueprint $table) {
            $table->unsignedInteger('bookshelf_id');
            $table->unsignedInteger('book_id')->index('bookshelves_books_book_id_foreign');
            $table->unsignedInteger('order');

            $table->primary(['bookshelf_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookshelves_books');
    }
};
