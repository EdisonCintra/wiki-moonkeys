<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\SubCategoria;

class WikiViewer extends Component
{
    public $categoriaSelecionadaId = null; // Para saber qual menu está aberto (opcional)
    public $subCategoriaAtual = null;      // O conteúdo que está sendo lido agora

    // Método chamado quando o usuário clica em um item do menu
    public function carregarConteudo($subCategoriaId)
    {
        // Busca a subcategoria e já traz os textos junto (Eager Loading)
        $this->subCategoriaAtual = SubCategoria::with('textos')->find($subCategoriaId);
    }

    public function render()
    {
        $categorias = Categoria::with('subcategorias')->get();

        return view('wiki-viewer', [
            'categorias' => $categorias
        ])->layout('layouts.wiki'); // <--- AQUI ESTÁ A MUDANÇA
    }
}
