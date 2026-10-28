<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class TaskManager extends Component
{
    public $title;
    public $description;
    public $priority = 'Medium';
    public $due_date;

    public function save()
    {
        $this->validate([
            'title' => 'required|min:3',
            'priority' => 'required',
        ]);

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'user_id' => auth()->id(),
        ]);

        $this->reset([
            'title',
            'description',
            'due_date'
        ]);
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'status' => 'Completed'
        ]);
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();
    }

    public function render()
    {
    return view('livewire.tasks.task-manager', [
        'tasks' => Task::where('user_id', auth()->id())
            ->latest()
            ->get()
    ])->layout('layouts.app');
    }
}