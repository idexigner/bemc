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
        Schema::create('specialization_doctor_mapping', function (Blueprint $table) {
            $table->id('specialization_mapping_id');
            $table->integer('specialization_mapping_specialization_id');
            $table->integer('specialization_mapping_doctor_id');
            $table->tinyInteger('specialization_mapping_is_active')->nullable()->default(1);
            $table->tinyInteger('specialization_mapping_is_deleted')->nullable()->default(0);
            $table->integer('specialization_mapping_created_by');
            $table->timestamp('specialization_mapping_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('specialization_mapping_updated_by')->nullable();
            $table->timestamp('specialization_mapping_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialization_doctor_mapping');
    }
};
