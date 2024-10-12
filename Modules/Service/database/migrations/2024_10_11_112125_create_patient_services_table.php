<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Service\Enums\patient_service\StatusEnum;
use Modules\Service\Models\HospitalService\HospitalService;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(HospitalService::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('category', StatusEnum::getValues());

            $table->unsignedBigInteger('requested_by');
            $table->foreign('requested_by')->references('id')->on('employees')->onDelete('cascade');
            $table->date('date_requested');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_services');
    }
};
