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
        Schema::create('generic', function (Blueprint $table) {
            $table->id('generic_id');
            $table->string('generic_name', 200);
            $table->string('generic_classification', 100)->nullable();
            $table->string('generic_safety_remark', 100)->nullable();
            $table->text('generic_indication')->nullable();
            $table->string('generic_indication_tags', 300)->nullable();
            $table->text('generic_dosage_administration')->nullable();
            $table->text('generic_contraindication_precaution')->nullable();
            $table->text('generic_composition')->nullable();
            $table->text('generic_pharmacology')->nullable();
            $table->text('generic_interaction')->nullable();
            $table->text('generic_side_effect')->nullable();
            $table->text('generic_overdose_effect')->nullable();
            $table->text('generic_storage_condition')->nullable();
            $table->text('generic_pregnancy_lactation')->nullable();            
            $table->tinyInteger('generic_is_active')->nullable()->default(1);
            $table->tinyInteger('generic_is_deleted')->nullable()->default(0);
            $table->integer('generic_created_by');
            $table->timestamp('generic_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('generic_updated_by');
            $table->timestamp('generic_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generic');
    }
};
