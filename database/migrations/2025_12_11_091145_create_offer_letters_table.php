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
        Schema::create('offer_letters', function (Blueprint $table) {
            $table->id();

            // Company Details
            $table->date('date')->nullable();
            $table->string('appointed_at')->nullable();
            $table->text('company_address')->nullable();
            $table->string('cin_number')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('company_email')->nullable();
            $table->string('md_contact')->nullable();
            $table->string('website')->nullable();

            // Candidate Details
            $table->string('candidate_name')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('adhar')->nullable();
            $table->string('position')->nullable();

            // Responsibilities (Array / JSON)
            $table->json('responsibility')->nullable();

            // Job & Offer Details
            $table->date('joining_date')->nullable();
            $table->string('job_location')->nullable();
            $table->string('working_hour')->nullable();
            $table->string('salary')->nullable();
            $table->string('payment_duration')->nullable();

            // Allowances
            $table->boolean('travelling')->default(0);
            $table->boolean('lunch')->default(0);
            $table->boolean('tiffin')->default(0);
            $table->boolean('dinner')->default(0);
            $table->boolean('lodging')->default(0);

            // Other Terms
            $table->string('attendence_present_in')->nullable();
            $table->string('notice_period')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_letters');
    }
};
