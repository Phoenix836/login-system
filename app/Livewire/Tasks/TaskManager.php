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
    public $editId = null;
    public $editing = false;

public function edit($id)
    {
         $task = Task::findOrFail($id);

            $this->editId = $task->id;
            $this->title = $task->title;
            $this->description = $task->description;
            $this->priority = $task->priority;
            $this->due_date = $task->due_date;

         $this->editing = true;
    }

public function save()
    {
        $this->validate([
            'title' => 'required|min:3',
            'priority' => 'required',
        ]);

        if ($this->editing) {

            Task::findOrFail($this->editId)
                ->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'priority' => $this->priority,
                    'due_date' => $this->due_date,
                ]);

        } else {

            Task::create([
                'title' => $this->title,
                'description' => $this->description,
                'priority' => $this->priority,
                'due_date' => $this->due_date,
                'user_id' => auth()->id(),
            ]);
        }

        $this->reset([
            'title',
            'description',
            'due_date',
            'editId',
            'editing',
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