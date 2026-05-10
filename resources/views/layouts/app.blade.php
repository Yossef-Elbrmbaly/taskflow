<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@if (auth()->check() && request()->routeIs(['todos', 'pomodoro']))

    <body class="bg-[#0d0d0f] text-white antialiased flex min-h-screen">

        {{-- Sidebar للشاشات الكبيرة --}}
        <aside class="hidden lg:flex w-[240px] min-h-screen bg-[#141417] border-r border-white/[0.06] flex-col px-4 py-6 fixed left-0 top-0 bottom-0 z-50">

            <a wire:navigate href="/" class="flex items-center gap-2.5 px-2 mb-8 pb-6 border-b border-white/[0.06]">
                <div class="w-8 h-8 bg-[#7c6aff] rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                    </svg>
                </div>
                <span class="font-bold text-[15px] text-white">taskflow</span>
            </a>

            <p class="text-[10px] uppercase tracking-[2px] text-white/30 px-2 mb-2">Menu</p>

            <nav class="flex flex-col gap-1">
                <a wire:navigate href="{{ route('todos') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                    {{ request()->routeIs('todos') ? 'bg-[#7c6aff]/15 text-[#a89fff]' : 'text-white/40 hover:text-white/80 hover:bg-white/5' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                    </svg>
                    My Tasks
                </a>
                <a wire:navigate href="{{ route('pomodoro') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                    {{ request()->routeIs('pomodoro') ? 'bg-[#7c6aff]/15 text-[#a89fff]' : 'text-white/40 hover:text-white/80 hover:bg-white/5' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Pomodoro
                </a>
            </nav>

            <div class="mt-auto border-t border-white/[0.06] pt-4">
                <div class="flex items-center gap-3 px-2 py-2 rounded-xl">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#7c6aff] to-[#ff6a6a] flex items-center justify-center text-xs font-bold text-white flex-shrink-0">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-white/30">Member</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" title="Logout"
                            class="p-1.5 rounded-lg text-white/30 hover:text-[#ff6a6a] hover:bg-white/5 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </aside>

        {{-- Top Bar للموبايل --}}
        <div class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-[#141417] border-b border-white/[0.06] px-4 h-14 flex items-center justify-between">
            <a wire:navigate href="/" class="flex items-center gap-2">
                <div class="w-7 h-7 bg-[#7c6aff] rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                    </svg>
                </div>
                <span class="font-bold text-[14px] text-white">taskflow</span>
            </a>
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#7c6aff] to-[#ff6a6a] flex items-center justify-center text-[10px] font-bold text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="p-1.5 rounded-lg text-white/30 hover:text-[#ff6a6a] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- المحتوى الرئيسي --}}
        <main class="lg:ml-[240px] flex-1 min-h-screen bg-[#0d0d0f] pt-14 lg:pt-0 flex items-center justify-center">
            <div class="w-full max-w-4xl px-6">
                {{ $slot }}
            </div>
        </main>

            {{-- Bottom Nav للموبايل --}}
            <nav class="lg:hidden fixed bottom-0 left-0 right-0 z-50 bg-[#141417] border-t border-white/[0.06] flex">
                <a wire:navigate href="{{ route('todos') }}"
                    class="flex-1 flex flex-col items-center justify-center gap-1 py-3 transition-colors
                    {{ request()->routeIs('todos') ? 'text-[#a89fff]' : 'text-white/30 hover:text-white/60' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                    </svg>
                    <span class="text-[10px] font-medium">My Tasks</span>
                </a>
                <a wire:navigate href="{{ route('pomodoro') }}"
                    class="flex-1 flex flex-col items-center justify-center gap-1 py-3 transition-colors
                    {{ request()->routeIs('pomodoro') ? 'text-[#a89fff]' : 'text-white/30 hover:text-white/60' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-[10px] font-medium">Pomodoro</span>
                </a>
            </nav>

    </body>

@else

    <body class="bg-[#fafafa] text-gray-900 antialiased">

        <nav class="w-full top-0 z-50 bg-[#141417] backdrop-blur-md border-b border-white/[0.06]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-3.5 flex items-center justify-between">

                <a wire:navigate href="/" class="flex items-center gap-2 -m-1.5 p-1.5">
                    <div class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                        </svg>
                    </div>
                    <span class="font-bold text-[24px] text-white">taskflow</span>
                </a>

                <div class="flex items-center gap-1">
                    @auth
                        <a wire:navigate href="{{ route('todos') }}"
                            class="px-3.5 py-2 rounded-lg text-lg font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors">
                            Make Your Tasks
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="px-3.5 py-2 rounded-lg text-lg font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors">
                                Logout
                            </button>
                        </form>
                    @endauth

                    @guest
                        @if (request()->routeIs('login') || request()->routeIs('register'))
                            <a wire:navigate href="{{ route('home') }}"
                                class="px-3.5 py-2 rounded-lg text-lg font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors">
                                Home
                            </a>
                        @else
                            <a wire:navigate href="{{ route('login') }}"
                                class="px-3.5 py-2 rounded-lg text-lg font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors">
                                Log in
                            </a>
                            <a wire:navigate href="{{ route('register') }}"
                                class="ml-1 px-4 py-2 rounded-lg text-lg font-semibold bg-gray-900 text-white hover:bg-gray-700 transition-colors">
                                Start for free
                            </a>
                        @endif
                    @endguest
                </div>

            </div>
        </nav>

        {{ $slot }}

    </body>

@endif

</html>
