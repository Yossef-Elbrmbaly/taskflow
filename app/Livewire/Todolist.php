<?php

namespace App\Livewire;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class TodoList extends Component
{
    #[Rule('required|min:2|max:255')]
    public string $title = '';

    public string $filter = 'all'; // all, active, completed

    public ?int $editingId = null;
    public string $editingTitle = '';

    public function addTodo(): void
    {
        $this->validate();

        Todo::create([
            'user_id' => Auth::id(),
            'title'   => trim($this->title),
        ]);

        $this->title = '';
    }

    public function toggleTodo(int $id): void
    {
        $todo = Auth::user()->todos()->findOrFail($id);
        $todo->update(['completed' => !$todo->completed]);
    }

    public function deleteTodo(int $id): void
    {
        Auth::user()->todos()->findOrFail($id)->delete();
    }

    public function startEdit(int $id): void
    {
        $todo = Auth::user()->todos()->findOrFail($id);
        $this->editingId    = $id;
        $this->editingTitle = $todo->title;
    }

    public function saveEdit(): void
    {
        $this->validate(['editingTitle' => 'required|min:2|max:255']);
        Auth::user()->todos()->findOrFail($this->editingId)->update(['title' => trim($this->editingTitle)]);
        $this->editingId    = null;
        $this->editingTitle = '';
    }

    public function cancelEdit(): void
    {
        $this->editingId    = null;
        $this->editingTitle = '';
    }

    public function clearCompleted(): void
    {
        Auth::user()->todos()->where('completed', true)->delete();
    }

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $query = Auth::user()->todos()->latest();
        $todos = match ($this->filter) {
            'active'    => (clone $query)->where('completed', false)->get(),
            'completed' => (clone $query)->where('completed', true)->get(),
            default     => $query->get(),
        };

        $totalCount     = Auth::user()->todos()->count();
        $completedCount = Auth::user()->todos()->where('completed', true)->count();
        $activeCount    = $totalCount - $completedCount;

        return view('livewire.todolist', compact('todos', 'totalCount', 'completedCount', 'activeCount'));
    }
}
