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
        Schema::create('country', function (Blueprint $table) {
            $table->id('country_id');
            $table->string('country_name', 200);
            $table->tinyInteger('country_is_active')->nullable()->default(1);
            $table->tinyInteger('country_is_deleted')->nullable()->default(0);
            $table->integer('country_created_by');
            $table->timestamp('country_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('country_updated_by')->nullable();
            $table->timestamp('country_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country');
    }
};
