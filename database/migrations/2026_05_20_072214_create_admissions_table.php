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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('admission_class');
            $table->string('previous_class');
            $table->string('student_name_bn');
            $table->string('student_name_en');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('phone_number');
            $table->date('dob');
            $table->string('gender');
            $table->text('current_address');
            $table->string('student_photo')->nullable();
            $table->string('student_document')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
