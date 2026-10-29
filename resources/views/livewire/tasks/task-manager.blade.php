<div>

    <a href="{{ route('dashboard') }}">
        ← Back to Dashboard
    </a>

    <br><br>

    <h1>Task Manager</h1>

    <form wire:submit.prevent="save">

        <input
            type="text"
            wire:model="title"
            placeholder="Task Title">

        <br><br>

        <textarea
            wire:model="description"
            placeholder="Description"></textarea>

        <br><br>

        <select wire:model="priority">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>

        <br><br>

        <input
            type="date"
            wire:model="due_date">

        <br><br>

        <button type="submit">
            Add Task
        </button>

    </form>

    <hr>

    @foreach($tasks as $task)

        <div>

            <strong>{{ $task->title }}</strong>

            <br>

            {{ $task->description }}

            <br>

            Priority: {{ $task->priority }}

            <br>

            Status: {{ $task->status }}

            <br>

            Due Date: {{ $task->due_date }}

            <br><br>

            <button wire:click="complete({{ $task->id }})">
                Complete
            </button>

            <button wire:click="delete({{ $task->id }})">
                Delete
            </button>

        </div>

        <hr>

    @endforeach

</div>