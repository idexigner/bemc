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
        Schema::create('brand_', function (Blueprint $table) {
            $table->id('brand_id');
            $table->string('brand_type', 20);
            $table->string('brand_name', 200);
            $table->integer('brand_generic_id');
            $table->integer('brand_manufacturer_id');
            $table->integer('brand_dosage_form_id');
            $table->integer('brand_strength_id');
            $table->integer('brand_pack_size_id');
            $table->string('brand_image',1000)->nullable();
            $table->double('brand_price',8,2);
            $table->tinyInteger('brand_is_hightlight')->nullable()->default(0);
            $table->tinyInteger('brand_is_new_product')->nullable()->default(0);
            $table->tinyInteger('brand_is_new_brand')->nullable()->default(0);
            $table->tinyInteger('brand_is_new_presentation')->nullable()->default(0);
            $table->tinyInteger('brand_is_active')->nullable()->default(1);
            $table->tinyInteger('brand_is_deleted')->nullable()->default(0);
            $table->integer('brand_created_by');
            $table->timestamp('brand_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('brand_updated_by')->nullable();
            $table->timestamp('brand_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_');
    }
};
