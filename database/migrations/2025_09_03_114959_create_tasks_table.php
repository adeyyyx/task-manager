<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id'); // 🔹 PK custom
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected', 'on_progress', 'done'])->default('pending');

            // 🔹 FK ke projects
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('project_id')->on('projects')
                ->onDelete('cascade');

            // 🔹 FK ke users (assigned user)
            $table->unsignedBigInteger('assigned_to');
            $table->foreign('assigned_to')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
