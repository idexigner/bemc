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
        Schema::create('journal', function (Blueprint $table) {
            $table->id('journal_id');
            $table->string('journal_title', 300);
            $table->string('journal_category', 100);
            $table->string('journal_type', 100);
            $table->string('journal_image', 1000);
            $table->tinyInteger('journal_is_active')->nullable()->default(1);
            $table->tinyInteger('journal_is_deleted')->nullable()->default(0);
            $table->integer('journal_created_by');
            $table->timestamp('journal_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('journal_updated_by')->nullable();
            $table->timestamp('journal_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal');
    }
};
