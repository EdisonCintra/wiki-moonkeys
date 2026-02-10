<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Categoria;
use App\Models\SubCategoria;

class CategoriaSecundaria extends Component
{
    public $nome_subcategoria = '';
    public $categoria_id = '';

    public function create()
    {
        $this->validate([
            'nome_subcategoria' => 'required|min:3',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Salva APENAS UMA VEZ
        SubCategoria::create([
            'nome_subcategoria' => $this->nome_subcategoria,
            'categoria_id' => $this->categoria_id,
        ]);

        // 1. Avisa o painel de postagens (Card 3)
        $this->dispatch('refresh-subcategories');

        // 2. Avisa o painel de exclusão (que vamos ajustar abaixo)
        $this->dispatch('conteudo-atualizado');

        $this->reset(['nome_subcategoria', 'categoria_id']);
        session()->flash('status', 'Sub-categoria criada com sucesso!');
    }

    #[On('refresh-categories')]
    public function atualizarLista()
    {
        // Recarrega o componente quando uma nova Categoria (Card 1) é criada
    }

    public function render()
    {
        return view('components.sub-categoria', [
            'categorias' => Categoria::all()
        ]);
    }
}
