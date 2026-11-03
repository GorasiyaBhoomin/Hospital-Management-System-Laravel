<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment', function (Blueprint $table) {
            if (!Schema::hasColumn('appointment', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
            }
        });

        // Drop unique constraint on email so users can book multiple appointments
        try {
            Schema::table('appointment', function (Blueprint $table) {
                $table->dropUnique('appointment_email_unique');
            });
        } catch (\Throwable $e) {
            // Index might already be dropped or have different name
            try {
                DB::statement('ALTER TABLE `appointment` DROP INDEX `appointment_email_unique`');
            } catch (\Throwable $ex) {
                // Ignore if not present
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment', function (Blueprint $table) {
            if (Schema::hasColumn('appointment', 'user_id')) {
                $table->dropColumn('user_id');
            }
        });
    }
};
