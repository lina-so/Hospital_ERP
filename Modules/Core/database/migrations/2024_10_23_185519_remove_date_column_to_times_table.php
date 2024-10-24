<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('times', function (Blueprint $table) {
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('times', function (Blueprint $table) {
            $table->date('start_time');
            $table->date('end_time');
        });
    }
};
