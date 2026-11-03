<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('appointment') && !Schema::hasColumn('appointment', 'day')) {
            Schema::table('appointment', function (Blueprint $table) {
                $table->string('day', 30)->nullable()->after('date');
            });
        }

        // Backfill existing rows with their day of week
        if (Schema::hasTable('appointment')) {
            $appointments = DB::table('appointment')->whereNull('day')->orWhere('day', '')->get();
            foreach ($appointments as $apt) {
                if (!empty($apt->date)) {
                    try {
                        $dayName = Carbon::parse($apt->date)->format('l');
                        DB::table('appointment')->where('id', $apt->id)->update(['day' => $dayName]);
                    } catch (\Exception $e) {
                        // ignore invalid date formats
                    }
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('appointment') && Schema::hasColumn('appointment', 'day')) {
            Schema::table('appointment', function (Blueprint $table) {
                $table->dropColumn('day');
            });
        }
    }
};

