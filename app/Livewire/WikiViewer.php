<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\SubCategoria;

class WikiViewer extends Component
{
    public $categoriaSelecionadaId = null;
    public $subCategoriaAtual = null;
    public $categorias;
    public function mount()
    {
        $this->categorias = Categoria::with('subcategorias')->get();
    }

    public function carregarConteudo($subCategoriaId)
    {
        $this->subCategoriaAtual = SubCategoria::with(['textos', 'categoria'])
            ->find($subCategoriaId);
    }


    public function render()
    {
        return view('wiki-viewer')
            ->layout('layouts.wiki');
    }
}
