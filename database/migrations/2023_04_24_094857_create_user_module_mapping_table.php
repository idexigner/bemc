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
        Schema::create('user_module_mapping', function (Blueprint $table) {
            $table->id('module_id');
            $table->integer('module_user_id');
            $table->tinyInteger('module_generic')->nullable()->default(0);
            $table->tinyInteger('module_brand')->nullable()->default(0);
            $table->tinyInteger('module_manufacturer')->nullable()->default(0);
            $table->tinyInteger('module_dosage_form')->nullable()->default(0);
            $table->tinyInteger('module_strength')->nullable()->default(0);
            $table->tinyInteger('module_pack_size')->nullable()->default(0);
            $table->tinyInteger('module_indication')->nullable()->default(0);
            $table->tinyInteger('module_scroller')->nullable()->default(0);
            $table->tinyInteger('module_doctor')->nullable()->default(0);
            $table->tinyInteger('module_job')->nullable()->default(0);
            $table->tinyInteger('module_news')->nullable()->default(0);
            $table->tinyInteger('module_journal')->nullable()->default(0);
            $table->tinyInteger('module_address')->nullable()->default(0);
            $table->tinyInteger('module_advertisement')->nullable()->default(0);
            $table->tinyInteger('module_special_report')->nullable()->default(0);
            $table->tinyInteger('module_video')->nullable()->default(0);
            $table->tinyInteger('module_user')->nullable()->default(0);
            $table->tinyInteger('module_setting')->nullable()->default(0);
            $table->integer('module_created_by');
            $table->timestamp('module_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('module_updated_by')->nullable();
            $table->timestamp('module_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_module_mapping');
    }
};
