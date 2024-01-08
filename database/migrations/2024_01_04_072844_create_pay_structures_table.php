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
        Schema::create('pay_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_code');
            //$table->foreign('emp_code')->references('emp_code')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('payhead_id');
            $table->foreign('payhead_id')->references('payhead_id')->on('payheads')->onDelete('cascade')->onUpdate('cascade');
            $table->string('default_amount');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_structures');
    }
};
