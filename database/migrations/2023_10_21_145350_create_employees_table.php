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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('emp_id');
            $table->string('emp_code');
            $table->string('emp_password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('emp_email');
            $table->string('emp_phone');
            $table->string('emp_country');
            $table->string('emp_address')->nullable();
            $table->string('emp_city');
            $table->string('identification_number');
            $table->string('identification_document');
            $table->string('joining_date');
            $table->string('photo')->nullable();
            $table->string('designation');
            $table->string('department');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
