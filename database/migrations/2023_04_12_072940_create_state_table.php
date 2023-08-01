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
        Schema::create('state', function (Blueprint $table) {
            $table->id('state_id');
            $table->string('state_name', 200);
            $table->integer('state_country_id');
            $table->tinyInteger('state_is_active')->nullable()->default(1);
            $table->tinyInteger('state_is_deleted')->nullable()->default(0);
            $table->integer('state_created_by');
            $table->timestamp('state_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('state_updated_by')->nullable();
            $table->timestamp('state_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state');
    }
};
