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
        Schema::create('user_task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('task_id')->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }
asdasdasdasasasdasdas MAKE IT PROJECT BECAUSE ITS NOT WORKING IN THE TASK. try it again
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('user_task');
    }
};