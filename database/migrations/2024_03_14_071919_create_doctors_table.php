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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            
            $table->string('username')->nullable(false);//doctor name 
            $table->string('email')->unique()->nullable(false);
            $table->string('dob')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('departmentname')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('postal_code')->nullable(false);
            $table->string('CV')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('Avatar')->nullable(false);
            $table->text('Bio')->nullable(false);
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
        Schema::dropIfExists('doctors');
    }
};
