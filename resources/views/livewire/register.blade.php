<div class="flex min-h-[calc(100vh)] w-full flex-col lg:flex-row">

    {{-- Form Section --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-16">
        <form wire:submit.prevent="register" class="w-full max-w-sm flex flex-col">

            {{-- Header --}}
            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Create an account</h2>
                <p class="text-gray-400 text-sm mt-2">Free forever. No credit card required.</p>
            </div>

            {{-- Name --}}
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Name</label>
                <input
                wire:model="name"
                type="text"
                placeholder="Enter your name"
                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7c6aff]/40 focus:border-[#7c6aff] transition-colors"
                />
                @error('name')
                    <span class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="w-full mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                <input
                wire:model="email"
                type="email"
                placeholder="Enter your email"
                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7c6aff]/40 focus:border-[#7c6aff] transition-colors"
                />
                @error('email')
                    <span class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="w-full mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                <input
                wire:model="password"
                type="password"
                placeholder="Enter a strong password"
                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7c6aff]/40 focus:border-[#7c6aff] transition-colors" />
                @error('password')
                    <span class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="w-full mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Confirm Password</label>
                <input
                wire:model="password_confirmation"
                type="password"
                placeholder="••••••••"
                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7c6aff]/40 focus:border-[#7c6aff] transition-colors" />
                @error('password_confirmation')
                    <span class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full mt-6 bg-gray-900 hover:bg-gray-700 text-white font-semibold py-2.5 px-4 rounded-xl text-sm transition-colors shadow-sm flex items-center justify-center gap-2">
                <span wire:loading.remove wire:target="register">Create account</span>
                <span wire:loading wire:target="register" class="flex items-center gap-2">
                    <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                    </svg>
                    Creating account...
                </span>
            </button>

            {{-- Link --}}
            <p class="text-gray-400 text-sm mt-5 text-center">
                Already have an account?
                <a wire:navigate class="text-[#7c6aff] font-medium hover:underline" href="{{ route('login') }}">Log in</a>
            </p>

        </form>
    </div>

    {{-- Right Panel --}}
    <div class="hidden lg:flex flex-col items-center justify-center w-1/2 bg-gray-900 p-16 relative overflow-hidden">

        {{-- Decorative blobs --}}
        <div
            class="absolute top-[-80px] right-[-80px] w-72 h-72 bg-[#7c6aff]/20 rounded-full blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute bottom-[-60px] left-[-60px] w-56 h-56 bg-[#ff6a6a]/10 rounded-full blur-3xl pointer-events-none">
        </div>

        {{-- Content --}}
        <div class="relative z-10 text-center max-w-xs">
            <div class="w-14 h-14 bg-[#7c6aff] rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-white tracking-tight">Start in seconds.</h3>
            <p class="text-gray-400 text-sm mt-3 leading-relaxed">
                Create your free account and start organizing your life today.
            </p>

            {{-- Feature list --}}
            <div class="mt-8 space-y-3 text-left">
                @foreach ([['Free forever, no credit card', '#7c6aff'], ['Sync across all your devices', '#4ade80'], ['Smart reminders & deadlines', '#fb923c']] as [$text, $color])
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 rounded-full flex-shrink-0 flex items-center justify-center"
                            style="background-color: {{ $color }}20">
                            <svg class="w-3 h-3" fill="none" stroke="{{ $color }}" viewBox="0 0 24 24"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm text-white/70">{{ $text }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Testimonial --}}
            <div class="mt-8 bg-white/5 border border-white/10 rounded-2xl p-4 text-left">
                <p class="text-white/70 text-xs leading-relaxed italic">
                    "This app completely changed how I manage my day. I finish 30% more tasks every week."
                </p>
                <div class="flex items-center gap-2 mt-3">
                    <div
                        class="w-6 h-6 rounded-full bg-[#7c6aff]/40 flex items-center justify-center text-[10px] font-bold text-[#b8b0ff]">
                        S</div>
                    <span class="text-white/40 text-xs">Sara M. · Product Designer</span>
                </div>
            </div>
        </div>

    </div>

</div>
