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
        Schema::create('joint_permissions', function (Blueprint $table) {
            $table->integer('role_id')->index();
            $table->string('entity_type');
            $table->integer('entity_id');
            $table->unsignedTinyInteger('status')->index();
            $table->unsignedInteger('owner_id')->nullable()->index();

            $table->primary(['role_id', 'entity_type', 'entity_id']);
            $table->index(['entity_id', 'entity_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joint_permissions');
    }
};
