<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('trading_name')->nullable();
            $table->string('description')->nullable();
            $table->string('stuff_size')->nullable();
            $table->string('industry')->nullable();
            $table->string('category')->nullable();
            $table->string('business_type')->nullable();
            $table->string('legal_business_name')->nullable();
            $table->string('registration_type')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
