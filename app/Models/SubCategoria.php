<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    // Indique o nome correto da tabela (plural)
    protected $table = 'sub_categorias';

    // Os campos que o banco realmente tem
    protected $fillable = [
        'nome_subcategoria', // Deve bater com a Migration
        'categoria_id',      // Essencial para o relacionamento
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function textos() {
        return $this->hasMany(Texto::class, 'sub_categoria_id');
    }
}
