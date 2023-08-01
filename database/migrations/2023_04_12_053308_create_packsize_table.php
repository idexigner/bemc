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
        Schema::create('packsize', function (Blueprint $table) {
            $table->id('packsize_id');
            $table->string('packsize_name', 200);
            $table->tinyInteger('packsize_is_active')->nullable()->default(1);
            $table->tinyInteger('packsize_is_deleted')->nullable()->default(0);
            $table->integer('packsize_created_by');
            $table->timestamp('packsize_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('packsize_updated_by')->nullable();
            $table->timestamp('packsize_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packsize');
    }
};
