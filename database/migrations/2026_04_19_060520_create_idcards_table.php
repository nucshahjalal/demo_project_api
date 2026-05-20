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
        Schema::create('idcards', function (Blueprint $table) {
            $table->id();
            $table->string('card_name');
            $table->integer('page_width');   
            $table->integer('page_height');  

            $table->enum('photo_style', ['round','square'])->default('square');
            $table->integer('photo_size')->nullable(); 

            $table->integer('margin_top')->default(5);
            $table->integer('margin_bottom')->default(5);
            $table->integer('margin_left')->default(5);
            $table->integer('margin_right')->default(5);

            $table->string('signature')->nullable();
            $table->text('template_html')->nullable(); 
            $table->longText('editor_content')->nullable(); 

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idcards');
    }
};
