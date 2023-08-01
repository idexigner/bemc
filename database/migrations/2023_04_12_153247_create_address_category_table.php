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
        Schema::create('address_category', function (Blueprint $table) {
            $table->id('address_category_id');
            $table->string('address_category_title', 300);
            $table->tinyInteger('address_category_is_active')->nullable()->default(1);
            $table->tinyInteger('address_category_is_deleted')->nullable()->default(0);
            $table->integer('address_category_created_by');
            $table->timestamp('address_category_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('address_category_updated_by')->nullable();
            $table->timestamp('address_category_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_category');
    }
};
