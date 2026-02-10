<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use App\Models\SubCategoria;
use App\Models\Texto;

new class extends Component {
    public $subCategoriaId = '';
    public $conteudo = '';
    public $textoId = null;

    #[Computed]
    public function subCategorias()
    {
        return SubCategoria::orderBy('nome_subcategoria')->get();
    }

    // Hook: Executa sempre que o Select da subcategoria muda
    public function updatedSubCategoriaId($id)
    {
        $this->reset(['conteudo', 'textoId']);

        if ($id) {
            // Busca o texto vinculado a esta subcategoria
            $texto = Texto::where('sub_categoria_id', $id)->latest()->first();

            if ($texto) {
                $this->conteudo = $texto->conteudo;
                $this->textoId = $texto->id;
            }
        }
    }

    #[On('refresh-subcategories')]
    public function refresh() {}

    public function update()
    {
        $this->validate([
            'conteudo' => 'required|min:5',
            'subCategoriaId' => 'required|exists:sub_categorias,id'
        ]);

        if ($this->textoId) {
            Texto::find($this->textoId)->update([
                'conteudo' => $this->conteudo
            ]);

            session()->flash('status', 'Conteúdo da Wiki atualizado!');
        }
    }
}; ?>

<div class="h-full">
    <form wire:submit="update" class="space-y-4">
        <flux:select wire:model.live="subCategoriaId" label="Escolha o tópico para editar" placeholder="Selecione...">
            @foreach($this->subCategorias as $sub)
                <flux:select.option value="{{ $sub->id }}">{{ $sub->nome_subcategoria }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:textarea
            wire:model="conteudo"
            label="Conteúdo Markdown"
            rows="10"
            placeholder="O texto aparecerá aqui para edição..."
        />

        <div class="flex items-center justify-between">
            <span class="text-xs text-zinc-500 italic">
                @if($textoId) Editando registro #{{ $textoId }} @else Selecione um tópico com texto. @endif
            </span>

            <flux:button variant="primary" type="submit" :disabled="!$textoId">
                Atualizar Postagem
            </flux:button>
        </div>
    </form>
</div>
