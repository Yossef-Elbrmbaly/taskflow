
<section class="py-20 lg:py-28 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-16 flex flex-col lg:flex-row items-center gap-16">

        {{-- Left Content --}}
        <div class="flex-1 max-w-xl">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 bg-gray-100 border border-gray-200 rounded-full px-3 py-1.5 mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 flex-shrink-0"></span>
                <span class="text-xs font-medium text-gray-500">New — Categories & filters just launched</span>
            </div>

            {{-- Heading --}}
            <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-[1.08] tracking-tight">
                Stay organized.<br>
                Stay <span class="text-[#7c6aff]">productive.</span>
            </h1>

            {{-- Subtext --}}
            <p class="mt-5 text-lg text-gray-500 leading-relaxed max-w-md">
                Join millions of users who simplify their work and life with a powerful,
                intuitive to-do list app.
            </p>

            {{-- Social proof --}}
            <div class="flex items-center gap-2 mt-5">
                <div class="flex">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <span class="text-sm text-gray-400">374K+ reviews · Trusted by 2M+ users</span>
            </div>

            {{-- CTAs --}}
            <div class="flex items-center gap-3 mt-8">
                <a wire:navigate href="{{ route('register') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gray-900 text-white text-sm font-semibold hover:bg-gray-700 transition-colors shadow-sm">
                    Start for free
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

        </div>

        {{-- Right — App mockup / image --}}
        <div class="flex-1 flex justify-center lg:justify-end w-full">
            {{--
                لو عندك صورة حقيقية، استبدل الـ div ده بـ:
                <img src="/images/hero.avif" class="w-full max-w-lg rounded-2xl shadow-xl object-cover aspect-[4/3]" alt="App screenshot">
            --}}
            <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 p-5">

                {{-- Mock header --}}
                <div class="flex items-center justify-between mb-4">
                    <span class="font-bold text-gray-900">My Tasks</span>
                    <div class="w-7 h-7 bg-[#7c6aff] rounded-lg flex items-center justify-center text-white font-bold text-lg leading-none">+</div>
                </div>

                {{-- Filter tabs --}}
                <div class="flex gap-1.5 mb-4">
                    <span class="text-xs px-3 py-1.5 rounded-lg bg-gray-900 text-white font-medium">All</span>
                    <span class="text-xs px-3 py-1.5 rounded-lg text-gray-400 hover:bg-gray-100 cursor-pointer">Active</span>
                    <span class="text-xs px-3 py-1.5 rounded-lg text-gray-400 hover:bg-gray-100 cursor-pointer">Done</span>
                </div>

                {{-- Todo items --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 opacity-60">
                        <div class="w-4 h-4 rounded flex-shrink-0 bg-green-500 border-green-500 flex items-center justify-center">
                            <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm text-gray-400 line-through flex-1">Setup the project</span>
                        <span class="text-[10px] bg-violet-100 text-violet-700 px-2 py-0.5 rounded-full font-medium">Work</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 opacity-60">
                        <div class="w-4 h-4 rounded flex-shrink-0 bg-green-500 border-green-500 flex items-center justify-center">
                            <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm text-gray-400 line-through flex-1">Buy groceries</span>
                        <span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-medium">Home</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 bg-white">
                        <div class="w-4 h-4 rounded flex-shrink-0 border-2 border-gray-300"></div>
                        <span class="text-sm text-gray-700 flex-1">Finish landing page</span>
                        <span class="text-[10px] bg-violet-100 text-violet-700 px-2 py-0.5 rounded-full font-medium">Work</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 bg-white">
                        <div class="w-4 h-4 rounded flex-shrink-0 border-2 border-gray-300"></div>
                        <span class="text-sm text-gray-700 flex-1">Morning run 5km</span>
                        <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full font-medium">Health</span>
                    </div>
                </div>

                {{-- Progress --}}
                <div class="mt-5">
                    <div class="flex justify-between text-xs text-gray-400 mb-2">
                        <span>Progress</span>
                        <span>50%</span>
                    </div>
                    <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full w-1/2 bg-[#7c6aff] rounded-full"></div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
