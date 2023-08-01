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
        Schema::create('doctor', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->string('doctor_name', 300);
            $table->string('doctor_email', 100)->nullable();
            $table->string('doctor_phone_personal', 20)->nullable();
            $table->string('doctor_phone_clinic', 20)->nullable();    
            $table->string('doctor_specialization', 100)->nullable();
            $table->string('doctor_achievement', 250)->nullable();
            $table->string('doctor_experience', 250)->nullable();
            $table->string('doctor_profession_degree', 250)->nullable();
            $table->string('doctor_gender', 10)->nullable();
            $table->string('doctor_certificate', 1200)->nullable();
            $table->string('doctor_image', 1200)->nullable();
            $table->text('doctor_bio_notes')->nullable();
            $table->text('doctor_address')->nullable();

            $table->integer('doctor_country_id')->nullable();
            $table->integer('doctor_state_id')->nullable();
            $table->integer('doctor_city_id')->nullable();
            $table->string('doctor_zip_code', 20)->nullable();

            
            $table->tinyInteger('doctor_is_active')->nullable()->default(1);
            $table->tinyInteger('doctor_is_deleted')->nullable()->default(0);
            $table->integer('doctor_created_by');
            $table->timestamp('doctor_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('doctor_updated_by')->nullable();
            $table->timestamp('doctor_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor');
    }
};
