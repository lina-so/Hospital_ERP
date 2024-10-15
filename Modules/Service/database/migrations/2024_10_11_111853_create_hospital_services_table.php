<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Hospital\Models\Department\Department;
use Modules\Service\Enums\hospital_service\StatusEnum;
use Modules\Service\Enums\hospital_service\CategoryEnum;
use Modules\Hospital\Models\Department\DepartmentCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hospital_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name')->unique();
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(DepartmentCategory::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();

            $table->enum('category', CategoryEnum::getValues());
            $table->enum('status', StatusEnum::getValues())->default(StatusEnum::Available);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_services');
    }
};
