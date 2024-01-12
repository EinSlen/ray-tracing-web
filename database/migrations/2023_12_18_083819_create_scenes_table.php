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
        Schema::create('scenes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('team');
            $table->text('description');
            $table->text('scenes');
            $table->string('image_path');
            $table->string('thumbnail_path');
            $table->string('executable_link');
            $table->foreignId('user_id')->constrained(); // L'utilisateur qui a ajouté la scène
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scenes');
    }
};
