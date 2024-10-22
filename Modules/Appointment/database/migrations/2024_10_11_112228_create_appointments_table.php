<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Appointment\Enums\appointment\StatusEnum;
use Modules\Service\Models\HospitalService\HospitalService;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(HospitalService::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('appointment_date');
            // $table->integer('duration')->default(0);
            $table->enum('status', StatusEnum::getValues())->default(StatusEnum::Upcoming);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
