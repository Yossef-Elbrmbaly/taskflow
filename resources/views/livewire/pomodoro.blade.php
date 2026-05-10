<div wire:poll.1000ms="tick" class="py-8 lg:py-12 w-full flex justify-center">
    <div class="w-full max-w-7xl">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white tracking-tight">Pomodoro Timer</h1>
                <p class="text-white/40 text-sm">Stay focused and maintain a healthy work-rest balance</p>
            </div>
            <button wire:click="$set('showSettings', true)"
                class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white/40 hover:text-white transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
        </div>

        <div class="bg-[#141417] border border-white/[0.05] rounded-[2.5rem] p-8 lg:p-14 shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.4fr] gap-12 lg:gap-16 items-center">

                <div class="flex flex-col items-center gap-10">
                    @php
                        $ringColor = match ($mode) {
                            'short_break' => '#fbbf24',
                            'long_break' => '#3b82f6',
                            default => '#22c55e',
                        };
                        $dashOffset = 553 - 553 * $progress;
                    @endphp

                    <div class="relative w-64 h-64 sm:w-72 sm:h-72 lg:w-80 lg:h-80 flex items-center justify-center">
                        <svg class="absolute inset-0 w-full h-full -rotate-90" viewBox="0 0 200 200">
                            <circle cx="100" cy="100" r="88" fill="none" stroke="rgba(255,255,255,0.03)"
                                stroke-width="8" />
                            <circle cx="100" cy="100" r="88" fill="none" stroke="{{ $ringColor }}"
                                stroke-width="8" stroke-linecap="round" stroke-dasharray="553"
                                stroke-dashoffset="{{ $dashOffset }}" class="transition-all duration-700" />
                        </svg>
                        <div class="flex flex-col items-center z-10">
                            <span class="font-mono text-6xl lg:text-7xl font-bold tracking-tighter"
                                style="color: {{ $ringColor }}">
                                {{ $formattedTime }}
                            </span>
                            <span class="text-[10px] uppercase tracking-[0.2em] text-white/20 mt-2 font-bold">
                                {{ $mode === 'focus' ? 'Focus' : 'Break' }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <button wire:click="toggleTimer"
                            class="w-16 h-16 rounded-full bg-white flex items-center justify-center shadow-xl hover:scale-105 transition-all active:scale-95">
                            @if ($isRunning)
                                <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z" />
                                </svg>
                            @else
                                <svg class="w-7 h-7 text-black translate-x-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            @endif
                        </button>
                        <button wire:click="resetTimer"
                            class="w-12 h-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white/40 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex flex-col gap-8">
                    <div class="bg-black/20 border border-white/5 rounded-2xl p-1.5 flex gap-1">
                        @foreach ([['focus', 'Focus', '#22c55e', 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'], ['short_break', 'Short Break', '#fbbf24', 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'], ['long_break', 'Long Break', '#3b82f6', 'M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z']] as [$key, $label, $color, $path])
                            <button wire:click="switchMode('{{ $key }}')" @class([
                                'flex-1 py-3 rounded-xl text-sm font-semibold transition-all flex items-center justify-center gap-2',
                                'bg-white/10' => $mode === $key,
                                'text-white/25 hover:text-white/50' => $mode !== $key,
                            ])>
                                <svg class="w-4 h-4 flex-shrink-0"
                                    style="color: {{ $mode === $key ? $color : 'currentColor' }}" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                </svg>
                                <span style="color: {{ $mode === $key ? $color : '' }}">{{ $label }}</span>
                            </button>
                        @endforeach
                    </div>

                    @php
                        $info = match ($mode) {
                            'short_break' => [
                                'title' => 'Short Break',
                                'desc' => 'Take a quick breather',
                                'color' => 'text-yellow-400',
                                'icon' =>
                                    'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                            ],
                            'long_break' => [
                                'title' => 'Long Break',
                                'desc' => 'Time for a longer rest',
                                'color' => 'text-blue-400',
                                'icon' =>
                                    'M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z',
                            ],
                            default => [
                                'title' => 'Focus Mode',
                                'desc' => 'Time to focus and be productive',
                                'color' => 'text-green-400',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                            ],
                        };
                    @endphp
                    <div
                        class="bg-white/[0.02] border border-white/5 rounded-[2rem] p-8 flex flex-col justify-center flex-1">
                        <div class="flex items-center gap-3 mb-4">
                            <svg class="w-6 h-6 flex-shrink-0 {{ $info['color'] }}" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $info['icon'] }}" />
                            </svg>
                            <span class="font-bold text-white text-2xl tracking-tight">{{ $info['title'] }}</span>
                        </div>
                        <p class="text-white/40 text-lg leading-relaxed">{{ $info['desc'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($showSettings)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm"
            wire:click.self="$set('showSettings', false)">

            <div class="bg-[#141417] border border-white/10 rounded-3xl p-8 w-full max-w-sm shadow-2xl">
                <h2 class="text-white font-bold text-xl mb-6">Timer Settings</h2>

                <div class="flex flex-col gap-4">
                    <div>
                        <label class="text-white/50 text-sm mb-1 block">Focus (minutes)</label>
                        <input wire:model="focusMins" type="number" min="1" max="120"
                            class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-white/30" />
                    </div>
                    <div>
                        <label class="text-white/50 text-sm mb-1 block">Short Break (minutes)</label>
                        <input wire:model="shortBreakMins" type="number" min="1" max="60"
                            class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-white/30" />
                    </div>
                    <div>
                        <label class="text-white/50 text-sm mb-1 block">Long Break (minutes)</label>
                        <input wire:model="longBreakMins" type="number" min="1" max="60"
                            class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-white/30" />
                    </div>
                </div>

                <div class="flex gap-3 mt-6">
                    <button wire:click="$set('showSettings', false)"
                        class="flex-1 py-2.5 rounded-xl border border-white/10 text-white/50 hover:text-white transition-all">
                        Cancel
                    </button>
                    <button wire:click="saveSettings"
                        class="flex-1 py-2.5 rounded-xl bg-white text-black font-semibold hover:bg-white/90 transition-all">
                        Save
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
