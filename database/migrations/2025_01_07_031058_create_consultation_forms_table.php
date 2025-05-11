<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->unsignedBigInteger('user_id');  // Foreign key to users table (unsignedBigInteger)
            $table->text('medical_conditions');
            $table->text('allergies');
            $table->text('reason_for_appointment');
            $table->boolean('acknowledgment_risks');
            $table->boolean('terms_agreement');
            $table->timestamps();
        
            // Set up the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }
    
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
