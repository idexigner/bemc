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
        Schema::create('special_report', function (Blueprint $table) {
            $table->id('special_report_id');
            $table->string('special_report_title', 300);
            $table->text('special_report_description')->nullable();
            $table->string('special_report_link_address', 1200)->nullable();            
            $table->string('special_report_image', 100)->nullable();
            $table->tinyInteger('special_report_is_active')->nullable()->default(1);
            $table->tinyInteger('special_report_is_deleted')->nullable()->default(0);
            $table->integer('special_report_created_by');
            $table->timestamp('special_report_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('special_report_updated_by')->nullable();
            $table->timestamp('special_report_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_report');
    }
};
