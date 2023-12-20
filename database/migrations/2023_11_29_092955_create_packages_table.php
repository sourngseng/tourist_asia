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
        Schema::create('provinces',function(Blueprint $table){
            $table->id();
            $table->bigInteger('country_id')->default(36);
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('zipcode')->nullable();
            $table->longText('detail')->nullable();
        });

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('province_id')->nullable();
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

        Schema::create('bookings',function(Blueprint $table){
            $table->id();
            $table->bigInteger('package_id')->nullable(); //កក់ Package មួយណា?
            $table->bigInteger('user_id')->nullable(); // User ណាកក់?
            $table->date('booking_date')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('guest')->default(1);
            $table->decimal('amount')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->default('confirmed'); // confirmed,canceled, blocked
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('packages');
        Schema::dropIfExists('bookings');
    }
};
