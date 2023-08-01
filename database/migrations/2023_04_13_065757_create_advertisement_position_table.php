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
        Schema::create('advertisement_position', function (Blueprint $table) {
            $table->id('advertisement_position_id');
            $table->string('advertisement_position_name', 300);
            $table->string('advertisement_position_class_name', 300);
            $table->integer('advertisement_position_width');
            $table->integer('advertisement_position_height');
            $table->integer('advertisement_position_number')->nullable()->default(0);
            $table->integer('advertisement_position_interval')->nullable()->default(1);
            $table->integer('advertisement_position_price')->nullable()->default(1);
            $table->tinyInteger('advertisement_position_is_featured')->nullable()->default(0);
            $table->tinyInteger('advertisement_position_is_active')->nullable()->default(1);
            $table->tinyInteger('advertisement_position_is_deleted')->nullable()->default(0);
            $table->integer('advertisement_position_created_by');
            $table->timestamp('advertisement_position_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('advertisement_position_updated_by')->nullable();
            $table->timestamp('advertisement_position_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisement_position');
    }
};
