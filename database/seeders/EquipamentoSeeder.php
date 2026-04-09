<?php

namespace Database\Seeders;

use App\Models\Equipamento;
use Illuminate\Database\Seeder;

class EquipamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipamentos = [
            [
                'nome' => 'Notebook Dell Latitude',
                'descricao' => 'Processador i5, 8GB RAM, Etiqueta #001',
                'status' => 'Disponível',
                'user_id' => 1,
            ],
            [
                'nome' => 'Projetor Epson PowerLite',
                'descricao' => 'Cabo HDMI e Controle Remoto inclusos',
                'status' => 'Inativo',
                'user_id' => 1,
            ],
            [
                'nome' => 'Kit Arduino Uno R3',
                'descricao' => 'Acompanha protoboard e jumpers',
                'status' => 'Disponível',
                'user_id' => 1,
            ],
            [
                'nome' => 'Osciloscópio Digital',
                'descricao' => 'Modelo 2 Canais 100MHz',
                'status' => 'Inativo',
                'user_id' => 1,
            ],
            [
                'nome' => 'Câmera Canon DSLR',
                'descricao' => 'Lente 50mm, Bateria extra',
                'status' => 'Disponível',
                'user_id' => 1,
            ],
        ];

        foreach ($equipamentos as $equipamento) {
            Equipamento::create($equipamento);
        }
    }
}
