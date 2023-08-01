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
        Schema::create('indication', function (Blueprint $table) {
            $table->id('indication_id');
            $table->string('indication_name', 2000);
            $table->tinyInteger('indication_is_active')->nullable()->default(1);
            $table->tinyInteger('indication_is_deleted')->nullable()->default(0);
            $table->integer('indication_created_by');
            $table->timestamp('indication_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('indication_updated_by')->nullable();
            $table->timestamp('indication_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indication');
    }
};
