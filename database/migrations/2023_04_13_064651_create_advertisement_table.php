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
        Schema::create('advertisement', function (Blueprint $table) {
            $table->id('advertisement_id');
            $table->string('advertisement_title', 300)->nullable();
            $table->string('advertisement_organization', 300);
            $table->string('advertisement_category', 50);
            $table->string('advertisement_link', 1200);
            $table->date('advertisement_publish');
            $table->date('advertisement_unpublish');
            $table->string('advertisement_image', 1200);

            $table->integer('advertisement_generic_id')->nullable();
            $table->integer('advertisement_brand_id')->nullable();
            $table->integer('advertisement_indication_id')->nullable();
            $table->integer('advertisement_manufacturer_id')->nullable();

            
            $table->integer('advertisement_position')->nullable();

            $table->tinyInteger('advertisement_is_featured')->nullable()->default(0);
            $table->tinyInteger('advertisement_is_active')->nullable()->default(1);
            $table->tinyInteger('advertisemephpnt_is_deleted')->nullable()->default(0);
            $table->integer('advertisement_created_by');
            $table->timestamp('advertisement_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('advertisement_updated_by')->nullable();
            $table->timestamp('advertisement_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisement');
    }
};
