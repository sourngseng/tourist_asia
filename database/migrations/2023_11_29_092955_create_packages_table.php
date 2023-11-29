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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->longText("detail")->nullable();
            $table->string("location")->nullable();
            $table->integer("duration")->nullable();
            $table->integer("guest")->nullable();
            $table->decimal("price")->nulable();            
            $table->string("photo")->nullable();
            $table->boolean("status")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
