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
        Schema::create('specialization', function (Blueprint $table) {
            $table->id('specialization_id');
            $table->string('specialization_name', 2000);
            $table->tinyInteger('specialization_is_active')->nullable()->default(1);
            $table->tinyInteger('specialization_is_deleted')->nullable()->default(0);
            $table->integer('specialization_created_by');
            $table->timestamp('specialization_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('specialization_updated_by')->nullable();
            $table->timestamp('specialization_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialization');
    }
};
