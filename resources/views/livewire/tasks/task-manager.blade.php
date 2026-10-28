<div class="max-w-4xl mx-auto p-6">

    <a href="{{ route('dashboard') }}">
        ← Back to Dashboard
    </a>

    <br><br>

    <h1 class="text-3xl font-bold mb-6">
        Task Manager
    </h1>

    <div class="bg-white shadow rounded p-6 mb-6">

        <form wire:submit.prevent="save">

            <div class="mb-4">
                <input
                    type="text"
                    wire:model="title"
                    placeholder="Task Title"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <textarea
                    wire:model="description"
                    placeholder="Description"
                    class="w-full border rounded p-2">
                </textarea>
            </div>

            <div class="mb-4">
                <select
                    wire:model="priority"
                    class="w-full border rounded p-2">
                    <option>Low</option>
                    <option>Medium</option>
                    <option>High</option>
                </select>
            </div>

            <div class="mb-4">
                <input
                    type="date"
                    wire:model="due_date"
                    class="w-full border rounded p-2">
            </div>

            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">
                Add Task
            </button>

        </form>

    </div>

    @foreach($tasks as $task)

        <div class="bg-white shadow rounded p-4 mb-4">

            <h3 class="text-xl font-semibold">
                {{ $task->title }}
            </h3>

            <p class="mt-2">
                {{ $task->description }}
            </p>

            <p class="mt-2">
                <strong>Priority:</strong>
                {{ $task->priority }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $task->status }}
            </p>

            <p>
                <strong>Due Date:</strong>
                {{ $task->due_date }}
            </p>

            <div class="mt-3">

                @if($task->status === 'Pending')

                <button
                    wire:click="edit({{ $task->id }})"
                    class="bg-yellow-500 text-white px-3 py-1 rounded">

                    Edit

                </button>

                    <button
                        wire:click="complete({{ $task->id }})"
                        class="bg-green-600 text-white px-3 py-1 rounded">

                        Complete

                    </button>

                @endif

                <button
                    wire:click="delete({{ $task->id }})"
                    class="bg-red-600 text-white px-3 py-1 rounded ml-2">

                    Delete

                </button>

            </div>

        </div>

    @endforeach

</div>