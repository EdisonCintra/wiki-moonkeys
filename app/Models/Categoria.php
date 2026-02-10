<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Ajuste para o nome que está na sua migration
    protected $fillable = ['nome_categoria'];

    // Ajuste para o plural conforme sua migration
    protected $table = 'categorias';

    public function subcategorias() {
        return $this->hasMany(SubCategoria::class);
    }



}
