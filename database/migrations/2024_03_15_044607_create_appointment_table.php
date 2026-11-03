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
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->string('appointmentname');
            $table->string('email')->unique();
            $table->string('phone')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->string('departmentname')->nullable(false);
            $table->string('username')->nullable(false);
            $table->string('date')->nullable(false);
            $table->string('time')->nullable(false);
            $table->text('message')->nullable(false);
            $table->string('Status')->default('Pending'); // Provide a default value

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
        Schema::dropIfExists('appointment');
    }
};
