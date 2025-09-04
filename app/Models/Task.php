<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'task_id'; // 🔹 pakai custom PK
    protected $fillable = [
        'title',
        'description',
        'status',
        'project_id',
        'assigned_to'
    ];

    // Relasi ke Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }
}
