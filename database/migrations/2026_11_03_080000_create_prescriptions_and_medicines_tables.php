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
        if (!Schema::hasTable('prescriptions')) {
            Schema::create('prescriptions', function (Blueprint $table) {
                $table->id();
                $table->string('prescription_number', 50)->unique();
                $table->unsignedBigInteger('appointment_id')->unique();
                $table->unsignedBigInteger('doctor_id');
                $table->unsignedBigInteger('patient_id')->nullable();
                $table->text('symptoms')->nullable();
                $table->string('symptoms_duration', 100)->nullable();
                $table->text('diagnosis');
                $table->text('clinical_notes')->nullable();
                $table->text('medical_history')->nullable();
                $table->text('allergies')->nullable();
                $table->text('medical_advice')->nullable();
                $table->boolean('follow_up_required')->default(false);
                $table->date('follow_up_date')->nullable();
                $table->text('additional_instructions')->nullable();
                $table->string('status', 20)->default('draft'); // 'draft', 'issued'
                $table->timestamp('issued_at')->nullable();
                $table->timestamps();

                $table->foreign('appointment_id')->references('id')->on('appointment')->onDelete('cascade');
                $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
                $table->foreign('patient_id')->references('id')->on('users')->onDelete('set null');
            });
        }

        if (!Schema::hasTable('prescription_medicines')) {
            Schema::create('prescription_medicines', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('prescription_id');
                $table->string('medicine_name', 255);
                $table->string('dosage', 100)->nullable();
                $table->string('frequency', 100)->nullable();
                $table->string('duration', 100)->nullable();
                $table->string('route', 100)->nullable();
                $table->string('instructions', 255)->nullable();
                $table->timestamps();

                $table->foreign('prescription_id')->references('id')->on('prescriptions')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription_medicines');
        Schema::dropIfExists('prescriptions');
    }
};
