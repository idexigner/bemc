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
        Schema::create('manufacturer', function (Blueprint $table) {
            $table->id('manufacturer_id');
            $table->string('manufacturer_name', 200);
            $table->string('manufacturer_email', 100)->nullable();
            $table->string('manufacturer_phone', 100)->nullable();
            $table->string('manufacturer_mobile', 100)->nullable();
            $table->string('manufacturer_fax', 100)->nullable();
            // $table->integer('manufacturer_location_id')->nullable();
            $table->text('manufacturer_address')->nullable();

            $table->integer('manufacturer_country_id')->nullable();
            $table->integer('manufacturer_state_id')->nullable();
            $table->integer('manufacturer_city_id')->nullable();
            $table->float('manufacturer_longitude', 8, 2)->nullable();
            $table->float('manufacturer_latitude', 8, 2)->nullable();

            $table->tinyInteger('manufacturer_is_active')->nullable()->default(1);
            $table->tinyInteger('manufacturer_is_deleted')->nullable()->default(0);
            $table->integer('manufacturer_created_by');
            $table->timestamp('manufacturer_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('manufacturer_updated_by')->nullable();
            $table->timestamp('manufacturer_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturer');
    }
};
