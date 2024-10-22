<?php

use App\Enums\Gender\GenderEnum;
use Illuminate\Support\Facades\Schema;
use Modules\Hospital\Models\Room\Room;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('sequence_number')->default(DB::raw('(UUID())'))->index();
            $table->string('ID_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->integer('age')->nullable();
            $table->enum('gender', GenderEnum::getValues());
            $table->string('phone_number')->unique();
            $table->text('address')->nullable();
            // $table->text('allergies')->nullable();
            $table->date('admission_date')->nullable();
            $table->date('discharge_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
