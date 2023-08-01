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
        Schema::create('location', function (Blueprint $table) {
            $table->id('location_id');
            $table->integer('location_country_id');
            $table->integer('location_state_id');
            $table->integer('location_city_id');
            $table->text('location_address');
            $table->float('location_longitude', 8, 2)->nullable();
            $table->float('location_latitude', 8, 2)->nullable();
            $table->tinyInteger('location_is_active')->nullable()->default(1);
            $table->tinyInteger('location_is_deleted')->nullable()->default(0);
            $table->integer('location_created_by');
            $table->timestamp('location_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('location_updated_by')->nullable();
            $table->timestamp('location_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location');
    }
};
