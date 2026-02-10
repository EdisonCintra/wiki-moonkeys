<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Flux\Flux;

new class extends Component {

    // Define o layout
    public function rendering($view): void
    {
        $view->layout('layouts.app');
    }

    // Variáveis de Estado (Inputs)
    public $categoriaParaDeletar = '';
    public $subCategoriaParaDeletar = '';

    // --- COMPUTED PROPERTIES ---
    // Isso é o "segredo". Ao usar #[Computed], o Livewire sabe cachear
    // e recalcular isso automaticamente quando o componente atualiza.

    #[Computed]
    public function categorias()
    {
        return Categoria::orderBy('nome_categoria')->get();
    }

    #[Computed]
    public function subCategorias()
    {
        return SubCategoria::orderBy('nome_subcategoria')->get();
    }

    // --- EVENTOS ---
    // Quando esses eventos ocorrem, este método roda (mesmo vazio)
    // e força o componente a renderizar novamente, atualizando os selects.
    #[On('refresh-categories')]
    #[On('refresh-subcategories')]
    #[On('conteudo-atualizado')]
    public function refreshComponent()
    {
        // O Livewire faz o re-render automaticamente
    }

    // --- AÇÕES ---
    public function deletarCategoria()
    {
        if (empty($this->categoriaParaDeletar)) return;

        $categoria = Categoria::find($this->categoriaParaDeletar);

        if ($categoria) {
            $categoria->delete();
            $this->categoriaParaDeletar = '';

            // Avisa os outros componentes
            $this->dispatch('refresh-categories');
        }
    }

    public function deletarSubCategoria()
    {
        if (empty($this->subCategoriaParaDeletar)) return;

        $sub = SubCategoria::find($this->subCategoriaParaDeletar);

        if ($sub) {
            $sub->delete();
            $this->subCategoriaParaDeletar = '';

            // Avisa os outros componentes
            $this->dispatch('refresh-subcategories');
        }
    }
}; ?>

<div class="relative w-full">

    <div class="mb-8 flex items-center justify-between">
        <div>
            <flux:heading size="xl" level="1">{{ __('Painel da Wiki') }}</flux:heading>
            <flux:subheading size="lg">{{ __('Gerencie categorias e escreva novos conteúdos.') }}</flux:subheading>
        </div>
    </div>

    <flux:separator variant="subtle" class="mb-8"/>

    {{-- SEUS CARDS DE CRIAÇÃO (Sem alterações) --}}
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 items-stretch mb-12">

        <div class="flex flex-col h-full">
            <div
                class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 h-full flex flex-col">
                <div>
                    <div class="mb-4 flex items-center gap-2">
                        <div
                            class="flex size-8 items-center justify-center rounded-full bg-lime-100 text-lime-700 dark:bg-lime-900/50 dark:text-lime-300">
                            1
                        </div>
                        <flux:heading size="lg">Nova Categoria</flux:heading>
                    </div>
                    <livewire:text-categoria/>
                </div>
            </div>
        </div>

        <div class="flex flex-col h-full">
            <div
                class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 h-full flex flex-col">
                <div>
                    <div class="mb-4 flex items-center gap-2">
                        <div
                            class="flex size-8 items-center justify-center rounded-full bg-blue-100 text-blue-700 dark:bg-blue-900/50 dark:text-blue-300">
                            2
                        </div>
                        <flux:heading size="lg">Nova Sub-Categoria</flux:heading>
                    </div>
                    <livewire:categoria-secundaria/>
                </div>
            </div>
        </div>

        <div class="flex flex-col h-full">
            <div
                class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 h-full flex flex-col">
                <div>
                    <div class="mb-4 flex items-center gap-2">
                        <div
                            class="flex size-8 items-center justify-center rounded-full bg-purple-100 text-purple-700 dark:bg-purple-900/50 dark:text-purple-300">
                            3
                        </div>
                        <flux:heading size="lg">Criar Postagem</flux:heading>
                    </div>
                    <div class="space-y-6">
                        <livewire:criar-postagem/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ÁREA DE EXCLUSÃO (Atualizada para usar a Classe) --}}
    <div class="space-y-6">
        <flux:heading size="xl">Gerenciar Exclusões</flux:heading>

        <div
            class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800">

            {{-- Painel 1: Apagar Categoria --}}
            <div class="space-y-4">
                <div class="p-4 bg-red-50 dark:bg-red-900/20 rounded-lg border border-red-100 dark:border-red-800/30">
                    <flux:heading size="lg" class="text-red-600 dark:text-red-400">Apagar Categoria</flux:heading>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400 mt-1">
                        ⚠️ Apaga <strong>todas</strong> as subcategorias e textos vinculados.
                    </p>
                </div>

                {{-- O wire:key ajuda o Flux a saber que deve redesenhar quando a contagem mudar --}}
                <div class="flex gap-2 items-end" wire:key="del-cat-{{ $this->categorias->count() }}">
                    <div class="grow">
                        <flux:select wire:model.live="categoriaParaDeletar" placeholder="Selecione a categoria...">

                            {{-- ACESSANDO VIA COMPUTED PROPERTY ($this->categorias) --}}
                            @foreach($this->categorias as $cat)
                                <flux:select.option
                                    value="{{ $cat->id }}">{{ $cat->nome_categoria }}</flux:select.option>
                            @endforeach

                        </flux:select>
                    </div>

                    <flux:button
                        variant="danger"
                        wire:click="deletarCategoria"
                        wire:confirm="TEM CERTEZA? Isso deletará tudo desta categoria."
                        :disabled="empty($categoriaParaDeletar)"
                    >
                        Deletar
                    </flux:button>
                </div>
            </div>

            {{-- Painel 2: Apagar Subcategoria --}}
            <div class="space-y-4">
                <div
                    class="p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg border border-orange-100 dark:border-orange-800/30">
                    <flux:heading size="lg" class="text-orange-600 dark:text-orange-400">Apagar Subcategoria
                    </flux:heading>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400 mt-1">
                        Apaga apenas os textos desta subcategoria.
                    </p>
                </div>

                <div class="flex gap-2 items-end" wire:key="del-sub-{{ $this->subCategorias->count() }}">
                    <div class="grow">
                        <flux:select wire:model.live="subCategoriaParaDeletar"
                                     placeholder="Selecione a subcategoria...">

                            {{-- ACESSANDO VIA COMPUTED PROPERTY ($this->subCategorias) --}}
                            @foreach($this->subCategorias as $sub)
                                <flux:select.option
                                    value="{{ $sub->id }}">{{ $sub->nome_subcategoria }}</flux:select.option>
                            @endforeach

                        </flux:select>
                    </div>

                    <flux:button
                        variant="danger"
                        wire:click="deletarSubCategoria"
                        wire:confirm="Apagar esta subcategoria?"
                        :disabled="empty($subCategoriaParaDeletar)"
                    >
                        Apagar
                    </flux:button>
                </div>
            </div>

        </div>
    </div>

    {{-- ... (Fim da div grid das 3 colunas de criação) ... --}}

    {{-- Abaixo do grid das 3 colunas de criação e antes das exclusões --}}
    <div class="mb-12 space-y-6 mt-10">

        <flux:heading size="xl">Gerenciar Postagem</flux:heading>

        <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="mb-6 flex items-center gap-2">
                <div class="flex size-8 items-center justify-center rounded-full bg-orange-100 text-orange-700 dark:bg-orange-900/50 dark:text-orange-300">4</div>
                <flux:heading size="lg">Editor de Conteúdo Existente</flux:heading>
            </div>

            <livewire:editar-conteudo />
        </div>
    </div>
</div>


