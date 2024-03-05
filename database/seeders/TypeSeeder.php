<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Incidente de Red',
            'Problema de Conexión',
            'Error de Software',
            'Problema de Hardware',
            'Solicitud de Acceso',
            'Problema de Impresión',
            'Solicitud de Software',
            'Actualización de Software',
            'Consulta de Configuración',
            'Otro'
        ];
        foreach ($types as $key => $type) {
            $id = strtoupper(($key + 1) . '_' . str_replace(' ', '_', $type));
            Type::create([
                'id' => $id,
                'name' => $type
            ]);
        }
    }
}
