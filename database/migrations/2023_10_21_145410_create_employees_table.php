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
            $table->increments('emp_id');

            $table->unsignedInteger('UserId');
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedInteger('DeptId');
            $table->foreign('DeptId')->references('dept_id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('EmpCode');
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
