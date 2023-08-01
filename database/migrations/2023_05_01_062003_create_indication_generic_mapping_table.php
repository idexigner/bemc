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
        Schema::create('indication_generic_mapping', function (Blueprint $table) {
            $table->id('indication_mapping_id');
            $table->integer('indication_mapping_indication_id');
            $table->integer('indication_mapping_generic_id');
            $table->tinyInteger('indication_mapping_is_active')->nullable()->default(1);
            $table->tinyInteger('indication_mapping_is_deleted')->nullable()->default(0);
            $table->integer('indication_mapping_created_by');
            $table->timestamp('indication_mapping_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('indication_mapping_updated_by')->nullable();
            $table->timestamp('indication_mapping_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indication_generic_mapping');
    }
};
