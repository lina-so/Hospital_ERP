<?php

use App\Enums\Gender\GenderEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Modules\Staff\Enums\employee\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Modules\Hospital\Models\Department\Department;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job_title');
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);
            $table->string('phone_number')->unique();
            $table->enum('employment_status', StatusEnum::getValues());
            $table->enum('gender', GenderEnum::getValues());

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
