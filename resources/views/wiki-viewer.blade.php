<div x-data="{ mobileMenuOpen: false }" class="flex flex-col lg:flex-row gap-8 min-h-[80vh] bg-[#0B1220] text-[#E2E8F0] relative">

    <div class="lg:hidden border-b border-[#1E293B] pb-4 mb-4">
        <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="flex items-center gap-2 text-[#60A5FA] hover:text-white transition p-2 rounded-md hover:bg-[#1E293B]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <span class="font-bold text-sm uppercase tracking-wider">Menu</span>
        </button>
    </div>

    <aside class="hidden lg:block w-64 flex-shrink-0 lg:border-r border-[#1E293B] lg:pr-6">
        <nav class="sticky top-24 space-y-6">
            @foreach($categorias as $categoria)
                <div>
                    <h3 class="mb-2 text-xs font-bold uppercase tracking-wider text-[#60A5FA]">
                        {{ $categoria->nome_categoria }}
                    </h3>
                    <ul class="space-y-1">
                        @foreach($categoria->subcategorias as $sub)
                            <li>
                                <button
                                        wire:click="carregarConteudo({{ $sub->id }})"
                                        class="w-full text-left rounded-lg px-3 py-2 text-sm transition-all duration-200
                                    {{ $this->subCategoriaAtual?->id === $sub->id
                                        ? 'bg-[#1E293B] text-[#FACC15] font-semibold shadow-lg shadow-blue-900/30'
                                        : 'text-[#94A3B8] hover:bg-[#1E293B] hover:text-[#E2E8F0]' }}"
                                >
                                    {{ $sub->nome_subcategoria }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </nav>
    </aside>

    <div x-show="mobileMenuOpen"
         class="fixed inset-0 z-50 flex lg:hidden"
         role="dialog"
         aria-modal="true"
         style="display: none;">

        <div x-show="mobileMenuOpen"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="mobileMenuOpen = false"
             class="fixed inset-0 bg-black/80 backdrop-blur-sm"></div>

        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="relative mr-16 flex w-full max-w-xs flex-1 flex-col bg-[#0B1220] border-r border-[#1E293B] p-6 shadow-2xl overflow-y-auto">

            <div class="flex items-center justify-between mb-8">
                <span class="text-lg font-bold text-[#F8FAFC]">Navegação</span>
                <button @click="mobileMenuOpen = false" class="-m-2.5 p-2.5 text-[#94A3B8] hover:text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="space-y-6">
                @foreach($categorias as $categoria)
                    <div>
                        <h3 class="mb-2 text-xs font-bold uppercase tracking-wider text-[#60A5FA]">
                            {{ $categoria->nome_categoria }}
                        </h3>
                        <ul class="space-y-1">
                            @foreach($categoria->subcategorias as $sub)
                                <li>
                                    <button
                                            @click="mobileMenuOpen = false"
                                            wire:click="carregarConteudo({{ $sub->id }})"
                                            class="w-full text-left rounded-lg px-3 py-2 text-sm transition-all duration-200
                                        {{ $this->subCategoriaAtual?->id === $sub->id
                                            ? 'bg-[#1E293B] text-[#FACC15] font-semibold'
                                            : 'text-[#94A3B8] hover:bg-[#1E293B] hover:text-[#E2E8F0]' }}"
                                    >
                                        {{ $sub->nome_subcategoria }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </nav>
        </div>
    </div>

    <section class="flex-1 min-w-0">
        @if($subCategoriaAtual)
            <div class="animate-fade-in-up">
                <div class="mb-6 border-b border-[#1E293B] pb-4">
                    <span class="text-sm text-[#60A5FA] font-medium">
                        {{ $subCategoriaAtual->categoria->nome_categoria }}
                    </span>
                    <h1 class="mt-1 text-3xl font-bold tracking-tight text-[#F8FAFC]">
                        {{ $subCategoriaAtual->nome_subcategoria }}
                    </h1>
                </div>

                <div class="prose prose-invert max-w-none text-[#CBD5E1]">
                    @php $parsedown = new Parsedown(); @endphp
                    @foreach($subCategoriaAtual->textos as $texto)
                        <div class="mb-6">
                            {!! $parsedown->text($texto->conteudo) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="max-w-5xl mx-auto">

                <div class="-mx-4 md:-mx-6 lg:mx-0 rounded-none lg:rounded-2xl overflow-hidden shadow-xl border-y lg:border border-white/10">
                    <img src="{{ asset('moonkeys_logo.png') }}"
                         class="w-full aspect-video lg:aspect-[2/1] object-cover object-center">
                </div>

                <div class="mt-6 text-center">
                    <h1 class="text-4xl font-bold text-[#F8FAFC]">
                        Bem-vindo à Wiki MoonKeys
                    </h1>
                    <p class="mt-2 text-[#CBD5E1] max-w-2xl mx-auto text-lg leading-relaxed">
                        Aqui você encontrará todas as informações necessárias para explorar o universo MoonKeys,
                        desde regras e sistemas até guias completos.
                    </p>
                </div>

                <div class="mt-6 grid gap-6 md:grid-cols-3 mb-8">

                    <div class="rounded-xl bg-[#1E293B] p-6 transition hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-900/30 cursor-pointer border border-white/5">
                        <h3 class="text-lg font-semibold text-[#FACC15] mb-2 flex items-center gap-2">
                            <span>📜</span> Regras
                        </h3>
                        <p class="text-sm text-[#CBD5E1]">
                            Entenda as normas que mantêm o servidor organizado e justo.
                        </p>
                    </div>

                    <div class="rounded-xl bg-[#1E293B] p-6 transition hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-900/30 cursor-pointer border border-white/5">
                        <h3 class="text-lg font-semibold text-[#60A5FA] mb-2 flex items-center gap-2">
                            <span>⚙️</span> Sistemas
                        </h3>
                        <p class="text-sm text-[#CBD5E1]">
                            Descubra as mecânicas exclusivas e funcionalidades do MoonKeys.
                        </p>
                    </div>

                    <div class="rounded-xl bg-[#1E293B] p-6 transition hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-900/30 cursor-pointer border border-white/5">
                        <h3 class="text-lg font-semibold text-[#E2E8F0] mb-2 flex items-center gap-2">
                            <span>🚀</span> Começar
                        </h3>
                        <p class="text-sm text-[#CBD5E1]">
                            Guia rápido para entrar, jogar e evoluir no servidor.
                        </p>
                    </div>

                </div>
            </div>
        @endif
    </section>

</div>