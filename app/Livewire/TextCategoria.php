<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class TextCategoria extends Component
{
    public $nome = '';

    // Regras de validação
    protected $rules = [
        // 1. Tabela 'categorias' (plural)
        // 2. Coluna 'nome_categoria' (conforme seu banco)
        'nome' => 'required|min:3|unique:categorias,nome_categoria',
    ];

    public function create()
    {
        // Valida usando as regras acima
        $this->validate();

        Categoria::create([
            'nome_categoria' => $this->nome,
        ]);

        $this->reset('nome');

        // Mensagem de sucesso
        session()->flash('status', 'Categoria criada com sucesso!');

        // Avisa os outros componentes (incluindo o de excluir) para atualizar
        $this->dispatch('refresh-categories');
        $this->dispatch('conteudo-atualizado');
    }

    public function render()
    {
        return view('components.text-categoria');
    }
}
