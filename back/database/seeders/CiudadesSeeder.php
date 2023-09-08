<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class CiudadesSeeder extends Seeder
{
    public function run()
    {
        Ciudad::create(['nombre' => 'Bogotá']);
        Ciudad::create(['nombre' => 'Villavicencio']);
        Ciudad::create(['nombre' => 'Cali']);
        Ciudad::create(['nombre' => 'Ibague']);
        Ciudad::create(['nombre' => 'Medellin']);
        Ciudad::create(['nombre' => 'Tunja']);
        Ciudad::create(['nombre' => 'Cali']);
    }
}
