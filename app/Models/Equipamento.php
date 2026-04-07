<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    protected $fillable = [
        'nome',
        'modelo',
        'fabricante',
        'numero_serie',
        'localizacao',
        'valor_estimado',
        'status'
    ];

    protected $casts = [
        'data_aquisicao' => 'date',
    ];
}
