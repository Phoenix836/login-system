<div>
    <h1>Task Manager</h1>

    <form wire:submit.prevent="save">

        <input
            type="text"
            wire:model="title"
            placeholder="Task Title">

        <textarea
            wire:model="description"
            placeholder="Description"></textarea>

        <select wire:model="priority">
            <option>Low</option>
            <option>Medium</option>
            <option>High</option>
        </select>

        <input
            type="date"
            wire:model="due_date">

        <button type="submit">
            Add Task
        </button>

    </form>

    <hr>

    @foreach($tasks as $task)

        <div style="margin-bottom:15px;">

            <strong>{{ $task->title }}</strong>

            <br>

            {{ $task->description }}

            <br>

            Priority:
            {{ $task->priority }}

            <br>

            Status:
            {{ $task->status }}

            <br><br>

            @if($task->status === 'Pending')

                <button
                    wire:click="complete({{ $task->id }})">

                    Complete

                </button>

            @endif

            <button
                wire:click="delete({{ $task->id }})">

                Delete

            </button>

        </div>

    @endforeach
</div>