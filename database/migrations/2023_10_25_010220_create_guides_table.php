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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string("name")->nullable();
            $table->string("position")->nullable();
            $table->longText("bio")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("facebook")->default("https://fb.com/");
            $table->string("twitter")->default("https://twitter.com/");
            $table->string("instagram")->default("https://instagram.com/");
            $table->string("photo")->nullable();
            $table->boolean("status")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
