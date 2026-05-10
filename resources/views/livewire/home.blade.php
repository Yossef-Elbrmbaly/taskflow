<div class="bg-[#0a0a0a] font-sans">
    <section id="hero" class="relative py-20 lg:py-32 overflow-hidden bg-[#0a0a0a] text-white">
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(circle_at_center,rgba(124,106,255,0.08)_0%,transparent_70%)]">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-16 flex flex-col lg:flex-row items-center gap-16">
            <div class="flex-1 max-w-xl">
                <div
                    class="inline-flex items-center gap-2 bg-gray-900/50 border border-gray-800 rounded-full px-3 py-1.5 mb-8">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 flex-shrink-0 animate-pulse"></span>
                    <span class="text-xs font-medium text-gray-400">New — Categories & filters just launched</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-white leading-[1.05] tracking-tight">
                    Stay organized.<br>
                    Stay <span class="text-[#7c6aff]">productive.</span>
                </h1>

                <p class="mt-6 text-lg text-gray-400 leading-relaxed max-w-md">
                    Join millions of users who simplify their work and life with a powerful, intuitive to-do list app.
                </p>

                <div class="flex items-center gap-3 mt-8 p-1">
                    <div class="flex -space-x-2">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <span class="text-sm text-gray-500 font-medium">374K+ reviews · Trusted by 2M+ users</span>
                </div>

                <div class="flex flex-wrap items-center gap-5 mt-10">
                    @auth
                        <a wire:navigate href="{{ route('todos') }}"
                            class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#7c6aff] text-white text-sm font-bold hover:bg-[#6a58eb] transition-all duration-300 shadow-[0_10px_20px_rgba(124,106,255,0.2)] hover:shadow-[0_15px_25px_rgba(124,106,255,0.4)] hover:-translate-y-1">
                            <span>Make Your Tasks</span>
                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    @else
                    <a wire:navigate href="{{ route('register') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#7c6aff] text-white text-sm font-bold hover:bg-[#6a58eb] transition-all duration-300 shadow-[0_10px_20px_rgba(124,106,255,0.2)] hover:shadow-[0_15px_25px_rgba(124,106,255,0.4)] hover:-translate-y-1">
                        <span>Start for free</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    @endauth

                    <a href="#features"
                        class="group relative inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-white transition-all duration-300 bg-white/5 border border-white/10 rounded-full hover:bg-white/10 hover:border-white/20 hover:-translate-y-1">
                        <span class="relative">Learn More</span>

                        <svg class="w-4 h-4 ml-2 transform transition-transform duration-300 group-hover:translate-x-1"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>

                        <div
                            class="absolute inset-0 rounded-full bg-gradient-to-r from-[#7c6aff]/20 to-[#ff6add]/20 opacity-0 group-hover:opacity-100 blur-md transition-opacity duration-500 -z-10">
                        </div>
                    </a>
                </div>
            </div>

            {{-- Right — App mockup --}}
            <div class="flex-1 flex justify-center lg:justify-end w-full">
                <div class="relative w-full max-w-md bg-[#111111] rounded-3xl shadow-2xl border border-gray-800 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <span class="font-bold text-white text-lg">My Tasks</span>
                        <div
                            class="w-8 h-8 bg-[#7c6aff] rounded-xl flex items-center justify-center text-white font-bold text-xl cursor-pointer hover:scale-110 transition-transform">
                            +</div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-4 rounded-2xl border border-gray-800 bg-[#161616]">
                            <div class="w-5 h-5 rounded-md flex-shrink-0 border-2 border-gray-700"></div>
                            <span class="text-sm text-gray-300 flex-1">Finish landing page</span>
                            <span
                                class="text-[10px] bg-violet-500/10 text-violet-400 px-2.5 py-1 rounded-lg font-bold border border-violet-500/20">Work</span>
                        </div>
                        <div
                            class="flex items-center gap-3 p-4 rounded-2xl border border-transparent bg-gray-900/30 opacity-40">
                            <div class="w-5 h-5 rounded-md flex-shrink-0 bg-green-500 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 line-through flex-1 font-medium">Setup the project</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="py-24 bg-[#0d0d14] text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-16">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Powerful Features for Enhanced Productivity</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">Everything you need to stay organized, focused, and
                    productive in one seamless workspace.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div
                    class="group p-8 rounded-3xl bg-[#111111] border border-gray-800 hover:border-blue-500/50 hover:shadow-[0_0_30px_rgba(59,130,246,0.1)] transition-all duration-300 cursor-pointer">
                    <div
                        class="w-12 h-12 bg-blue-600/10 rounded-2xl flex items-center justify-center mb-6 border border-blue-600/20 group-hover:bg-blue-600/20 transition-colors">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 group-hover:text-blue-400 transition-colors">Task Management</h3>
                    <p class="text-gray-400 leading-relaxed text-sm">Organize tasks with priorities, categories, and
                        recurring schedules. Track progress with subtasks.</p>
                </div>

                <div
                    class="group p-8 rounded-3xl bg-[#111111] border border-gray-800 hover:border-green-500/50 hover:shadow-[0_0_30px_rgba(34,197,94,0.1)] transition-all duration-300 cursor-pointer">
                    <div
                        class="w-12 h-12 bg-green-600/10 rounded-2xl flex items-center justify-center mb-6 border border-green-600/20 group-hover:bg-green-600/20 transition-colors">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 group-hover:text-green-400 transition-colors">Smart Notes</h3>
                    <p class="text-gray-400 leading-relaxed text-sm">Create and organize notes with tags, colors, and
                        folders. Pin important notes and use powerful formatting tools.</p>
                </div>

                <div
                    class="group p-8 rounded-3xl bg-[#111111] border border-gray-800 hover:border-red-500/50 hover:shadow-[0_0_30px_rgba(239,68,68,0.1)] transition-all duration-300 cursor-pointer">
                    <div
                        class="w-12 h-12 bg-red-600/10 rounded-2xl flex items-center justify-center mb-6 border border-red-600/20 group-hover:bg-red-600/20 transition-colors">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 group-hover:text-red-400 transition-colors">Pomodoro Timer</h3>
                    <p class="text-gray-400 leading-relaxed text-sm">Stay focused with customizable work sessions and
                        break intervals. Track your productivity streaks.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section id="faq" class="py-24 bg-[#0a0a0a] border-t border-gray-900">
        <div class="max-w-3xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4 tracking-tight">Frequently Asked Questions</h2>
                <p class="text-gray-400 text-lg">Find answers to common questions about TaskMate and productivity.</p>
            </div>

            <div class="space-y-4">
                {{-- ضيف الجزء ده هنا عشان تحل مشكلة Undefined variable --}}
                @php
                    $faqs = [
                        [
                            'q' => 'What is TaskMate?',
                            'a' =>
                                'TaskMate is a comprehensive productivity tool that combines task management, Pomodoro timer, and mind mapping features in one seamless workspace. It helps you organize tasks, maintain focus, and boost your daily productivity.',
                        ],
                        [
                            'q' => 'Is TaskMate free to use?',
                            'a' =>
                                'Yes! TaskMate offers a generous free-forever plan that includes all core features. Premium features are available for users who need advanced productivity tools and capabilities.',
                        ],
                        [
                            'q' => 'How does the Pomodoro timer work?',
                            'a' =>
                                "TaskMate's Pomodoro timer follows the popular time-management method with customizable work and break intervals. The default setting is 25 minutes of focused work followed by 5-minute breaks, but you can adjust these intervals to match your preferred workflow.",
                        ],
                        [
                            'q' => 'What makes TaskMate different?',
                            'a' =>
                                'TaskMate stands out by combining essential productivity tools in one intuitive interface, featuring AI-powered suggestions, seamless integration between features, and a clean, distraction-free design focused on enhancing your workflow.',
                        ],
                    ];
                @endphp

                @foreach ($faqs as $faq)
                    <details class="group border-b border-gray-800">
                        <summary class="flex items-center justify-between py-7 cursor-pointer list-none">
                            <span
                                class="text-lg font-semibold text-gray-200 group-hover:text-[#7c6aff] transition-colors">
                                {{ $faq['q'] }}
                            </span>
                            <span
                                class="text-gray-600 transition-transform duration-300 group-open:rotate-180 group-open:text-[#7c6aff]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="pb-7 text-gray-400 leading-relaxed text-lg italic">
                            {{ $faq['a'] }}
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-[#0d0d14] text-white pt-10 pb-10 border-t border-gray-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-16">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-10">
                <div class="md:col-span-7">
                    <a href="#hero" class="text-3xl font-bold tracking-tight mb-6 block"
                        style="font-family: 'Inter', sans-serif;">
                        TaskMate
                    </a>
                    <p class="text-gray-400 text-[16px] leading-relaxed max-w-sm mb-8 font-medium">
                        Your personal productivity companion for enhanced focus, organization, and calm.
                    </p>
                    <div class="flex items-center gap-3">
                        <a href="https://www.instagram.com/yossef.elbrmbaly/" target="_blank"
                            class="w-11 h-11 flex items-center justify-center rounded-2xl bg-[#1a1a24] border border-gray-800 hover:border-[#7c6aff] transition-all">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                                </rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/yossef-elbrmbaly/" target="_blank"
                            class="w-11 h-11 flex items-center justify-center rounded-2xl bg-[#1a1a24] border border-gray-800 hover:border-[#7c6aff] transition-all">
                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.268c-.966 0-1.75-.785-1.75-1.75s.784-1.75 1.75-1.75 1.75.785 1.75 1.75-.784 1.75-1.75 1.75zm13.5 11.268h-3v-5.604c0-1.337-.026-3.062-1.868-3.062s-2.154 1.459-2.154 2.965v5.701h-3v-10h2.881v1.367h.041c.401-.761 1.381-1.562 2.844-1.562 3.042 0 3.603 2.001 3.603 4.599v5.596z" />
                            </svg>
                        </a>
                        <a href="https://github.com/Yossef-Elbrmbaly" target="_blank"
                            class="w-11 h-11 flex items-center justify-center rounded-2xl bg-[#1a1a24] border border-gray-800 hover:border-[#7c6aff] transition-all">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.744.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-5 flex md:justify-end">
                    <div class="grid grid-cols-2 gap-12">
                        <div>
                            <h4 class="text-white font-bold mb-6 text-lg">Product</h4>
                            <ul class="space-y-4 text-[15px]">
                                <li><a href="#features"
                                        class="text-gray-500 hover:text-[#7c6aff] transition-colors underline-offset-4 hover:underline">Features</a>
                                </li>
                                <li><a href="#faq"
                                        class="text-gray-500 hover:text-[#7c6aff] transition-colors underline-offset-4 hover:underline">FAQ</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-white font-bold mb-6 text-lg">Legal</h4>
                            <ul class="space-y-4 text-[15px]">
                                <li><a href="#"
                                        class="text-gray-500 hover:text-white transition-colors">Privacy</a></li>
                                <li><a href="#"
                                        class="text-gray-500 hover:text-white transition-colors">Terms</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-900 flex flex-col md:flex-row justify-center items-center gap-6">
                <div class="text-gray-500 text-sm font-medium">© 2026 TaskMate. All rights reserved.</div>
            </div>
        </div>
    </footer>
</div>
