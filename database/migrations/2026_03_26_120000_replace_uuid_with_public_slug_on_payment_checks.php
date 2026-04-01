<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('payment_checks', function (Blueprint $table) {
            $table->string('public_slug', 128)->nullable();
        });

        foreach (DB::table('payment_checks')->cursor() as $row) {
            DB::table('payment_checks')
                ->where('id', $row->id)
                ->update(['public_slug' => $row->uuid]);
        }

        Schema::table('payment_checks', function (Blueprint $table) {
            $table->dropUnique(['uuid']);
            $table->dropColumn('uuid');
        });

        Schema::table('payment_checks', function (Blueprint $table) {
            $table->unique('public_slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        throw new RuntimeException('Migration 2026_03_26_120000_replace_uuid_with_public_slug_on_payment_checks cannot be reversed safely.');
    }
};
