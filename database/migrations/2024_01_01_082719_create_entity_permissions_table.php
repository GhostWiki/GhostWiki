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
        Schema::create('entity_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('entity_id');
            $table->string('entity_type', 25);
            $table->unsignedInteger('role_id')->index('new_entity_permissions_role_id_index');
            $table->boolean('view')->default(false);
            $table->boolean('create')->default(false);
            $table->boolean('update')->default(false);
            $table->boolean('delete')->default(false);

            $table->index(['entity_id', 'entity_type'], 'new_entity_permissions_entity_id_entity_type_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_permissions');
    }
};
