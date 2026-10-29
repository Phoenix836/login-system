<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class TaskManager extends Component
{
    public $title = '';
    public $description = '';
    public $priority = 'Medium';
    public $due_date = '';

    public function save()
    {
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'status' => 'Pending',
            'user_id' => 1,
        ]);

        $this->reset([
            'title',
            'description',
            'due_date',
        ]);

        $this->priority = 'Medium';
    }

    public function complete($id)
    {
        Task::findOrFail($id)->update([
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
            'tasks' => Task::latest()->get()
        ])->layout('layouts.app');
    }
}
