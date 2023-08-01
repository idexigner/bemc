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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('title',20)->nullable();
            $table->string('firstname',50)->nullable();
            $table->string('lastname',50)->nullable();
            $table->string('profession',100)->nullable();
            $table->string('organization',100)->nullable();
            $table->integer('country_id')->length(5)->nullable();
            $table->integer('state_id')->length(5)->nullable();
            $table->integer('city_id')->length(5)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('telephone',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->integer('role_id')->length(5)->nullable();
            $table->tinyInteger('is_active')->nullable()->default(1);
            $table->tinyInteger('is_deleted')->nullable()->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
