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
        Schema::create('user_role', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role_name',50);
            $table->tinyInteger('role_is_active')->nullable()->default(1);
            $table->tinyInteger('role_is_deleted')->nullable()->default(0);
            $table->integer('role_created_by');
            $table->timestamp('role_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('role_updated_by');
            $table->timestamp('role_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
    }
};
