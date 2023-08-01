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
        Schema::create('video', function (Blueprint $table) {
            $table->id('video_id');
            $table->string('video_title', 300);
            $table->string('video_link', 1200);
            $table->string('video_image', 1200);
            $table->tinyInteger('video_is_featured')->nullable()->default(0);
            $table->tinyInteger('video_is_active')->nullable()->default(1);
            $table->tinyInteger('video_is_deleted')->nullable()->default(0);
            $table->integer('video_created_by');
            $table->timestamp('video_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('video_updated_by')->nullable();
            $table->timestamp('video_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video');
    }
};
