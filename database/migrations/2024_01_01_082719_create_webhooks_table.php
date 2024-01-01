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
        Schema::create('webhooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->index();
            $table->boolean('active')->index();
            $table->string('endpoint', 500);
            $table->timestamps();
            $table->unsignedInteger('timeout')->default(3);
            $table->text('last_error');
            $table->timestamp('last_called_at')->nullable();
            $table->timestamp('last_errored_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webhooks');
    }
};
