<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Add doctor panel columns to doctors table
        Schema::table('doctors', function (Blueprint $table) {
            if (!Schema::hasColumn('doctors', 'password')) {
                $table->string('password')->default(Hash::make('doctor123'))->after('email');
            }
            if (!Schema::hasColumn('doctors', 'qualification')) {
                $table->string('qualification')->default('MBBS, MD')->after('departmentname');
            }
            if (!Schema::hasColumn('doctors', 'experience')) {
                $table->string('experience')->default('8+ Years')->after('qualification');
            }
            if (!Schema::hasColumn('doctors', 'room_no')) {
                $table->string('room_no')->default('OPD Room #102')->after('experience');
            }
            if (!Schema::hasColumn('doctors', 'consultation_fee')) {
                $table->decimal('consultation_fee', 8, 2)->default(500.00)->after('room_no');
            }
            if (!Schema::hasColumn('doctors', 'is_available')) {
                $table->boolean('is_available')->default(true)->after('consultation_fee');
            }
            if (!Schema::hasColumn('doctors', 'remember_token')) {
                $table->rememberToken()->after('Bio');
            }
        });

        // 2. Doctor Time Slots Table (CRUD)
        if (!Schema::hasTable('doctor_time_slots')) {
            Schema::create('doctor_time_slots', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('doctor_id')->index();
                $table->string('day_of_week')->default('All Days'); // Monday, Tuesday... or All Days
                $table->string('start_time')->default('09:00 AM');
                $table->string('end_time')->default('10:00 AM');
                $table->string('slot_display')->nullable(); // e.g. "09:00 AM - 10:00 AM"
                $table->integer('max_patients')->default(8);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 3. Doctor Schedules Table (Weekly Availability)
        if (!Schema::hasTable('doctor_schedules')) {
            Schema::create('doctor_schedules', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('doctor_id')->index();
                $table->string('day_name'); // Monday, Tuesday...
                $table->string('morning_start')->nullable()->default('09:00 AM');
                $table->string('morning_end')->nullable()->default('01:00 PM');
                $table->string('evening_start')->nullable()->default('04:00 PM');
                $table->string('evening_end')->nullable()->default('07:30 PM');
                $table->boolean('is_day_off')->default(false);
                $table->string('notes')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('doctor_schedules');
        Schema::dropIfExists('doctor_time_slots');

        Schema::table('doctors', function (Blueprint $table) {
            $cols = ['password', 'qualification', 'experience', 'room_no', 'consultation_fee', 'is_available', 'remember_token'];
            foreach ($cols as $c) {
                if (Schema::hasColumn('doctors', $c)) {
                    $table->dropColumn($c);
                }
            }
        });
    }
};
