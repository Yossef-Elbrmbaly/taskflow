<div class="flex min-h-screen w-full">

    {{-- Form Side --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
        <div class="w-full max-w-sm">


            {{-- Heading --}}
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Welcome back</h1>
            <p class="mt-2 text-sm text-gray-500">Enter your credentials to continue.</p>

            {{-- Form --}}
            <form wire:submit.prevent="login" class="mt-8 flex flex-col gap-4">

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input
                    wire:model="email"
                    type="email"
                    placeholder="Enter your email"
                    class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7c6aff]/40 focus:border-[#7c6aff] transition"
                    >
                    @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-sm font-medium text-gray-700">Password</label>
                    </div>
                    <input
                    wire:model="password"
                    type="password"
                    placeholder="••••••••"
                    class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7c6aff]/40 focus:border-[#7c6aff] transition"
                    >
                    @error('password')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full mt-2 py-2.5 px-4 bg-gray-900 hover:bg-gray-700 text-white text-sm font-semibold rounded-xl transition-colors flex items-center justify-center gap-2">
                    <span>Login</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </button>

            </form>

            {{-- Footer link --}}
            <p class="mt-6 text-center text-sm text-gray-400">
                Don't have an account?
                <a wire:navigate href="{{ route('register') }}" class="text-[#7c6aff] font-medium hover:underline">Sign up</a>
            </p>

        </div>
    </div>

    {{-- Decorative Side --}}
    <div class="hidden lg:flex flex-col items-center justify-center w-1/2 bg-gray-950 p-12 relative overflow-hidden">

        {{-- Background pattern --}}
        <div class="absolute inset-0 opacity-[0.04]"
            style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 28px 28px;">
        </div>

        {{-- Floating mock card --}}
        <div class="relative z-10 w-full max-w-sm bg-white/5 backdrop-blur border border-white/10 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between mb-5">
                <span class="font-bold text-base">My Tasks</span>
                <span class="text-xs bg-[#7c6aff]/20 text-[#a89bff] px-2.5 py-1 rounded-full font-medium">3 active</span>
            </div>
            <div class="space-y-3">
                @foreach ([
                    ['done' => true,  'text' => 'Setup Laravel project',   'tag' => 'Work',   'color' => 'violet'],
                    ['done' => true,  'text' => 'Configure authentication', 'tag' => 'Work',   'color' => 'violet'],
                    ['done' => false, 'text' => 'Build Todo component',     'tag' => 'Dev',    'color' => 'blue'],
                    ['done' => false, 'text' => 'Deploy to production',     'tag' => 'DevOps', 'color' => 'amber'],
                ] as $item)
                <div class="flex items-center gap-3 {{ $item['done'] ? 'opacity-50' : '' }}">
                    <div class="w-4 h-4 rounded flex-shrink-0 {{ $item['done'] ? 'bg-green-500' : 'border-2 border-white/30' }} flex items-center justify-center">
                        @if($item['done'])
                            <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        @endif
                    </div>
                    <span class="text-sm flex-1 {{ $item['done'] ? 'line-through text-white/40' : 'text-white/80' }}">
                        {{ $item['text'] }}
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium
                        {{ $item['color'] === 'violet' ? 'bg-violet-500/20 text-violet-300' : '' }}
                        {{ $item['color'] === 'blue'   ? 'bg-blue-500/20 text-blue-300'     : '' }}
                        {{ $item['color'] === 'amber'  ? 'bg-amber-500/20 text-amber-300'   : '' }}">
                        {{ $item['tag'] }}
                    </span>
                </div>
                @endforeach
            </div>
            <div class="mt-5 pt-4 border-t border-white/10">
                <div class="flex justify-between text-xs text-white/40 mb-2">
                    <span>Progress</span><span>50%</span>
                </div>
                <div class="h-1 bg-white/10 rounded-full overflow-hidden">
                    <div class="h-full w-1/2 bg-[#7c6aff] rounded-full"></div>
                </div>
            </div>
        </div>

        {{-- Quote --}}
        <p class="relative z-10 mt-8 text-center text-sm text-white/30 max-w-xs leading-relaxed">
            "A goal without a plan is just a wish."
        </p>

    </div>

</div>
