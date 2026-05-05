<div class="px-4 py-6 sm:px-8 md:px-10 md:py-10 max-w-3xl w-full">

    {{-- PAGE HEADER --}}
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white tracking-tight">
            My <span class="text-[#7c6aff]">Tasks</span>
        </h1>
        <p class="text-white/40 text-sm mt-1.5">Welcome back, {{ Auth::user()->name }} 👋</p>
    </div>

    {{-- STATS --}}
    <div class="grid grid-cols-3 gap-2 sm:gap-3 mb-6">
        <div class="bg-[#1a1a1f] border border-white/[0.06] rounded-2xl p-3 sm:p-4">
            <p class="text-xl sm:text-2xl font-extrabold text-white">{{ $totalCount }}</p>
            <p class="text-[9px] sm:text-[10px] uppercase tracking-widest text-white/30 mt-1">Total</p>
        </div>
        <div class="bg-[#1a1a1f] border border-white/[0.06] rounded-2xl p-3 sm:p-4">
            <p class="text-xl sm:text-2xl font-extrabold text-[#a89fff]">{{ $activeCount }}</p>
            <p class="text-[9px] sm:text-[10px] uppercase tracking-widest text-white/30 mt-1">Active</p>
        </div>
        <div class="bg-[#1a1a1f] border border-white/[0.06] rounded-2xl p-3 sm:p-4">
            <p class="text-xl sm:text-2xl font-extrabold text-green-400">{{ $completedCount }}</p>
            <p class="text-[9px] sm:text-[10px] uppercase tracking-widest text-white/30 mt-1">Done</p>
        </div>
    </div>

    {{-- PROGRESS BAR --}}
    @if ($totalCount > 0)
        <div class="bg-[#1a1a1f] border border-white/[0.06] rounded-2xl p-4 mb-6">
            <div class="flex justify-between text-xs text-white/30 mb-2.5">
                <span>Progress</span>
                <span>{{ round(($completedCount / $totalCount) * 100) }}%</span>
            </div>
            <div class="h-1.5 bg-white/[0.06] rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-[#7c6aff] to-[#ff6a6a] rounded-full transition-all duration-500"
                    style="width: {{ ($completedCount / $totalCount) * 100 }}%"></div>
            </div>
        </div>
    @endif

    {{-- ADD FORM --}}
    <form wire:submit="addTodo" class="flex flex-col sm:flex-row gap-2 sm:gap-3 mb-6">
        <input wire:model="title" type="text" placeholder="Add a new task…" autocomplete="off"
            class="flex-1 bg-[#1a1a1f] border border-white/[0.06] rounded-xl px-4 py-3 text-sm text-white
                   placeholder-white/20
                   focus:outline-none focus:ring-2 focus:ring-[#7c6aff]/40 focus:border-[#7c6aff]/60
                   transition-colors">
        <button type="submit"
            class="w-full sm:w-auto px-5 py-3 bg-[#7c6aff] hover:bg-[#6a5aee] text-white text-sm font-semibold rounded-xl
                   transition-colors sm:flex-shrink-0 whitespace-nowrap">
            + Add Task
        </button>
    </form>

    @error('title')
        <p class="text-red-400 text-xs mb-4 flex items-center gap-1.5 -mt-4">
            <svg class="w-3 h-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
            </svg>
            {{ $message }}
        </p>
    @enderror

    {{-- FILTER TABS --}}
    <div class="flex gap-2 mb-4">
        <button wire:click="setFilter('all')"
            class="px-4 py-1.5 rounded-lg text-xs font-medium transition-colors
                   {{ $filter === 'all'
                       ? 'bg-[#7c6aff] text-white'
                       : 'border border-white/[0.08] text-white/40 hover:text-white/70 hover:border-white/20' }}">
            All
        </button>
        <button wire:click="setFilter('active')"
            class="px-4 py-1.5 rounded-lg text-xs font-medium transition-colors
                   {{ $filter === 'active'
                       ? 'bg-[#7c6aff] text-white'
                       : 'border border-white/[0.08] text-white/40 hover:text-white/70 hover:border-white/20' }}">
            Active
        </button>
        <button wire:click="setFilter('completed')"
            class="px-4 py-1.5 rounded-lg text-xs font-medium transition-colors
                   {{ $filter === 'completed'
                       ? 'bg-[#7c6aff] text-white'
                       : 'border border-white/[0.08] text-white/40 hover:text-white/70 hover:border-white/20' }}">
            Completed
        </button>
    </div>

    {{-- TODO LIST --}}
    <div class="flex flex-col gap-2.5">
        @forelse($todos as $todo)
            <div wire:key="todo-{{ $todo->id }}"
                class="group flex items-center gap-3 bg-[#1a1a1f] border border-white/[0.06] rounded-xl px-4 py-3.5
                        hover:border-white/[0.12] transition-all
                        {{ $todo->completed ? 'opacity-50' : '' }}">

                {{-- Checkbox --}}
                <button wire:click="toggleTodo({{ $todo->id }})"
                    class="w-5 h-5 rounded-md flex-shrink-0 border-2 flex items-center justify-center transition-all
                           {{ $todo->completed ? 'bg-green-500 border-green-500' : 'border-white/20 hover:border-[#7c6aff]' }}">
                    @if ($todo->completed)
                        <svg class="w-3 h-3 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    @endif
                </button>

                {{-- Title or Edit input --}}
                @if ($editingId === $todo->id)
                    <input wire:model="editingTitle" wire:keydown.enter="saveEdit" wire:keydown.escape="cancelEdit"
                        type="text" autofocus
                        class="flex-1 bg-transparent border-b border-[#7c6aff] text-white text-sm
                               focus:outline-none py-0.5 placeholder-white/20">
                    <button wire:click="saveEdit"
                        class="p-1.5 rounded-lg text-green-400 hover:bg-green-500/10 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                    <button wire:click="cancelEdit"
                        class="p-1.5 rounded-lg text-white/30 hover:bg-white/5 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                @else
                    <span
                        class="flex-1 text-sm {{ $todo->completed ? 'line-through text-white/30' : 'text-white/80' }}">
                        {{ $todo->title }}
                    </span>

                    {{-- Edit --}}
                    <button wire:click="startEdit({{ $todo->id }})"
                        class="p-1.5 rounded-lg text-white/20 hover:text-white/60 hover:bg-white/5 transition-colors
                               opacity-0 group-hover:opacity-100">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>

                    {{-- Delete --}}
                    <button wire:click="deleteTodo({{ $todo->id }})" wire:confirm="Delete this task?"
                        class="p-1.5 rounded-lg text-white/20 hover:text-[#ff6a6a] hover:bg-[#ff6a6a]/10 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                @endif

            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-16 text-white/20">
                <svg class="w-12 h-12 mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <p class="text-sm">No tasks here. Add one above!</p>
            </div>
        @endforelse
    </div>

    {{-- CLEAR COMPLETED --}}
    @if ($completedCount > 0)
        <button wire:click="clearCompleted" wire:confirm="Clear all completed tasks?"
            class="mt-5 px-4 py-2 border border-white/[0.08] rounded-lg text-xs text-white/30
                   hover:border-[#ff6a6a]/40 hover:text-[#ff6a6a] transition-colors">
            Clear {{ $completedCount }} completed task{{ $completedCount > 1 ? 's' : '' }}
        </button>
    @endif

</div>
