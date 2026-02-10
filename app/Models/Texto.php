<?php

namespace App\Livewire; // Cuidado com o namespace, deve ser App\Models geralmente
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $table = 'textos'; // Garante que usa a tabela certa

    protected $fillable = [
        'conteudo',          // Corrigido de 'texto' para 'conteudo' (igual migration)
        'sub_categoria_id',  // Necessário para o vínculo
    ];

    // Opcional: Relacionamento inverso
    public function subcategoria() {
        return $this->belongsTo(SubCategoria::class, 'sub_categoria_id');
    }
}
