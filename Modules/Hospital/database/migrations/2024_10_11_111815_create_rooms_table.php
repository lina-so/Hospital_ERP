<?php

use Illuminate\Support\Facades\Schema;
use Modules\Hospital\Models\Floor\Floor;
use Illuminate\Database\Schema\Blueprint;
use Modules\Hospital\Enums\room\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Modules\Hospital\Models\Department\Department;
use Modules\Hospital\Models\Department\DepartmentCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique();
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Floor::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->enum('status', StatusEnum::getValues());

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
