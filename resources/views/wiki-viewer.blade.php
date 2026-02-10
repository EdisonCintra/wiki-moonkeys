<div class="flex flex-col lg:flex-row gap-8 min-h-[80vh]">

    <aside class="w-full lg:w-64 flex-shrink-0 lg:border-r border-zinc-200 dark:border-zinc-800 lg:pr-6">
        <nav class="sticky top-24 space-y-6">
            @foreach($categorias as $categoria)
                <div>
                    <h3 class="mb-2 text-xs font-bold uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                        {{ $categoria->nome_categoria }}
                    </h3>
                    <ul class="space-y-1">
                        @foreach($categoria->subcategorias as $sub)
                            <li>
                                <button
                                    wire:click="carregarConteudo({{ $sub->id }})"
                                    class="w-full text-left rounded-md px-3 py-2 text-sm transition-colors
                                    {{ $this->subCategoriaAtual?->id === $sub->id
                                        ? 'bg-purple-100 text-purple-700 font-medium dark:bg-purple-900/30 dark:text-purple-300'
                                        : 'text-zinc-600 hover:bg-zinc-100 dark:text-zinc-400 dark:hover:bg-zinc-800' }}"
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

    <section class="flex-1 min-w-0">
        @if($subCategoriaAtual)
            <div class="animate-fade-in-up"> <div class="mb-6 border-b border-zinc-200 pb-4 dark:border-zinc-800">
                    <span class="text-sm text-purple-600 font-medium">{{ $subCategoriaAtual->categoria->nome_categoria }}</span>
                    <h1 class="mt-1 text-3xl font-bold tracking-tight text-zinc-900 dark:text-zinc-100">
                        {{ $subCategoriaAtual->nome_subcategoria }}
                    </h1>
                </div>

                <div class="prose dark:prose-invert max-w-none text-zinc-600 dark:text-zinc-300">

                    @php
                        // Instancia o conversor (Parsedown)
                        $parsedown = new Parsedown();
                    @endphp

                    @foreach($subCategoriaAtual->textos as $texto)
                        <div class="mb-6">
                            {{-- IMPORTANTE: Use {!! !!} para o HTML ser interpretado --}}
                            {!! $parsedown->text($texto->conteudo) !!}
                        </div>
                    @endforeach

                </div>
            </div>
        @else
            <div class="flex h-full flex-col items-center justify-center text-center opacity-60">
                <flux:icon.book-open class="size-16 mb-4 text-zinc-300"/>
                <h2 class="text-xl font-semibold">Selecione um tópico</h2>
                <p class="text-sm">Navegue pelo menu ao lado para ler.</p>
            </div>
        @endif
    </section>

</div>
