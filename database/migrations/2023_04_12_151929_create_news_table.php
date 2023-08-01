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
        Schema::create('news', function (Blueprint $table) {
            $table->id('news_id');
            $table->string('news_title', 200);
            $table->text('news_description');
            $table->string('news_image', 1000);
            $table->date('news_publish_date');
            $table->date('news_unpublish_date');
            $table->tinyInteger('news_is_active')->nullable()->default(1);
            $table->tinyInteger('news_is_deleted')->nullable()->default(0);
            $table->integer('news_created_by');
            $table->timestamp('news_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('news_updated_by')->nullable();
            $table->timestamp('news_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
