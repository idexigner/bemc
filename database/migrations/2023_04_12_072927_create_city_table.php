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
        Schema::create('city', function (Blueprint $table) {
            $table->id('city_id');
            $table->string('city_name', 200);
            $table->integer('city_state_id');
            $table->tinyInteger('city_is_active')->nullable()->default(1);
            $table->tinyInteger('city_is_deleted')->nullable()->default(0);
            $table->integer('city_created_by');
            $table->timestamp('city_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('city_updated_by')->nullable();
            $table->timestamp('city_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city');
    }
};
