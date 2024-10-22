<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Modules\Hospital\Models\Doctor\Doctor;
use Modules\Appointment\Models\Visit\Visit;
use Illuminate\Database\Migrations\Migration;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Service\Models\PatientService\PatientService;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Doctor::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Visit::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(PatientService::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate(); // إن كانت نتيجة الكشف تتطلب عملية او صورة شعاعية او تحاليل او ....الخ
            $table->text('diagnosis'); // التشخيص الطبي
            $table->text('symptoms'); //  الاعراض
            $table->string('allergy');
            $table->text('treatment')->comment('name of medicines');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
