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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('eng_no');
            $table->string('chassis_no');
            $table->string('brand');
            $table->string('model');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->index('eng_no');
            $table->index('chassis_no');
            $table->index('brand');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
