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
        Schema::create('job', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_category', 20);
            $table->string('job_title', 200);
            $table->text('job_description');
            $table->string('job_organization', 300);
            $table->string('job_organization_logo', 1000)->nullable();
            $table->string('job_position', 100);
            $table->date('job_application_deadline');
            $table->date('job_publish_date');
            $table->string('job_image', 1000)->nullable();
            $table->string('job_salary', 100)->nullable();
            // $table->double('job_salary', 8,2)->nullable();
            $table->text('job_educational_requirement')->nullable();
            $table->text('job_experience_requirement')->nullable();
            $table->integer('job_vacancy')->nullable();
            $table->integer('job_age_limit')->nullable();
            $table->string('job_location', 200)->nullable();
            $table->string('job_type', 1000)->nullable();
            $table->string('job_source', 1000)->nullable();
            $table->string('job_employment_type', 1000)->nullable();
            $table->string('job_nature', 100)->nullable();
            $table->text('job_application_procedure')->nullable();
            $table->tinyInteger('job_is_active')->nullable()->default(1);
            $table->tinyInteger('job_is_deleted')->nullable()->default(0);
            $table->integer('job_created_by');
            $table->timestamp('job_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('job_updated_by')->nullable();
            $table->timestamp('job_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job');
    }
};
