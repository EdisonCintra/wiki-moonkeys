<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; // <--- ADICIONE ISSO AQUI!
use App\Models\SubCategoria;
use App\Models\Texto;

class CriarPostagem extends Component
{
    public $conteudo = '';
    public $sub_categoria_id = '';

    public function save() // Mudei de 'create' para 'save' para variar, tudo bem
    {
        $this->validate([
            'sub_categoria_id' => 'required|exists:sub_categorias,id',
            'conteudo' => 'required|min:10',
        ]);

        Texto::create([
            'sub_categoria_id' => $this->sub_categoria_id,
            'conteudo' => $this->conteudo,
        ]);

        $this->reset(['conteudo', 'sub_categoria_id']);
        session()->flash('status', 'Postagem publicada com sucesso!');
    }

    // Este método escuta o evento disparado pelo Card 2
    #[On('refresh-subcategories')]
    public function updateList()
    {
        // Força o render a rodar de novo para pegar a nova subcategoria
    }

    public function render()
    {
        return view('components.criar-postagem', [
            'subcategorias' => SubCategoria::all()
        ]);
    }
}
