<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = [
        'user_id', 'nome', 'modelo', 'fabricante', 'numero_serie',
        'data_aquisicao', 'status', 'valor_estimado', 'localizacao', 'descricao'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
