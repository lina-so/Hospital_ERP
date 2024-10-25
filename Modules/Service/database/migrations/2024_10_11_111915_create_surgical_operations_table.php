<?php

use Illuminate\Support\Facades\Schema;
use Modules\Hospital\Models\Room\Room;
use Illuminate\Database\Schema\Blueprint;
use Modules\Hospital\Models\Doctor\Doctor;
use Illuminate\Database\Migrations\Migration;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Appointment\Models\Appointment\Appointment;
use Modules\Service\Enums\surgical_operation\StatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surgical_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Appointment::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Doctor::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Room::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('operation_type');
            $table->integer('duration')->default(0); // Duration in minutes
            $table->enum('status', StatusEnum::getValues())->default(StatusEnum::Scheduled);

            $table->date('operation_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surgical_operations');
    }
};
