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
        
        Schema::create('strength', function (Blueprint $table) {
            $table->id('strength_id');
            $table->string('strength_name', 200);
            $table->tinyInteger('strength_is_active')->nullable()->default(1);
            $table->tinyInteger('strength_is_deleted')->nullable()->default(0);
            $table->integer('strength_created_by');
            $table->timestamp('strength_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('strength_updated_by')->nullable();
            $table->timestamp('strength_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strength');
    }
};
