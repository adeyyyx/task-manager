<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 1. Buat Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // password = "password"
            'role' => 'admin',
        ]);

        // 🔹 2. Buat User biasa
        $user = User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // password = "password"
            'role' => 'user',
        ]);

        // 🔹 3. Buat Project
        $project = Project::create([
            'name' => 'Project Demo',
            'description' => 'Project percobaan pertama',
            'user_id' => $admin->id, // admin sebagai pembuat project
        ]);

        // 🔹 4. Buat Task
        Task::create([
            'title' => 'Task Demo',
            'description' => 'Task percobaan pertama',
            'status' => 'pending',
            'project_id' => $project->project_id,
            'assigned_to' => $user->id, // assign ke user biasa
        ]);
    }
}
