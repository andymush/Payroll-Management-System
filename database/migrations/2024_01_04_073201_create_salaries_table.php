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
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('salary_id');
            $table->string('emp_code');
            //$table->foreignId('emp_code')->references('emp_code')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('payhead_id');
            $table->foreign('payhead_id')->references('payhead_id')->on('payheads')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('amount', 8, 2);
            $table->string('pay_month');
            $table->decimal('earning_total', 8, 2);
            $table->decimal('deduction_total', 8, 2);
            $table->decimal('net_salary', 8, 2);
            $table->date('generation_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
