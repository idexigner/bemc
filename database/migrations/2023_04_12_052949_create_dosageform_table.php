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
        Schema::create('dosageform', function (Blueprint $table) {
            $table->id('dosageform_id');
            $table->string('dosageform_name', 200);
            $table->tinyInteger('dosageform_is_active')->nullable()->default(1);
            $table->tinyInteger('dosageform_is_deleted')->nullable()->default(0);
            $table->integer('dosageform_created_by');
            $table->timestamp('dosageform_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('dosageform_updated_by')->nullable();
            $table->timestamp('dosageform_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosageform');
    }
};
