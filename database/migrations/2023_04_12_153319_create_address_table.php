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
        Schema::create('address', function (Blueprint $table) {
            $table->id('address_id');
            $table->string('address_title', 300);
            $table->integer('address_category');
            $table->text('address_detail');
            $table->string('address_contact', 200);
            $table->tinyInteger('address_is_active')->nullable()->default(1);
            $table->tinyInteger('address_is_deleted')->nullable()->default(0);
            $table->integer('address_created_by');
            $table->timestamp('address_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('address_updated_by')->nullable();
            $table->timestamp('address_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
};
