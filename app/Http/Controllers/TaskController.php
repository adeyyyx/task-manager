<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // =============================
    // ADMIN CRUD
    // =============================

    public function index()
    {
        $tasks = Task::with(['project', 'assignedUser'])->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        $users = User::all(); // semua user bisa dipilih
        return view('tasks.create', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,project_id',
            'assigned_to' => 'required|exists:users,id',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
            'project_id' => $request->project_id,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dibuat.');
    }


    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'projects', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,project_id',
            'assigned_to' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->only('project_id', 'assigned_to', 'title', 'description'));

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus.');
    }

    // =============================
    // USER (tugas saya)
    // =============================

    public function myTasks()
    {
        $tasks = Task::with('project')
            ->where('assigned_to', auth()->id())
            ->latest()
            ->get();

        return view('tasks.my', compact('tasks'));
    }

    public function accept(Task $task)
    {
        $this->authorizeUser($task);

        $task->update(['status' => 'accepted']);
        return back()->with('success', 'Tugas berhasil diterima.');
    }

    public function reject(Task $task)
    {
        $this->authorizeUser($task);

        $task->update(['status' => 'rejected']);
        return back()->with('success', 'Tugas ditolak.');
    }

    public function progress(Task $task)
    {
        $this->authorizeUser($task);

        $task->update(['status' => 'on_progress']); // ✅ disesuaikan dengan migration
        return back()->with('success', 'Tugas sedang dikerjakan.');
    }

    public function done(Task $task)
    {
        $this->authorizeUser($task);

        $task->update(['status' => 'done']);
        return back()->with('success', 'Tugas selesai.');
    }

    // =============================
    // Helper untuk cek kepemilikan
    // =============================
    private function authorizeUser(Task $task)
    {
        if ($task->assigned_to !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
