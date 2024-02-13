<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveles = ['Primero', 'Segundo', 'Tercero'];
        foreach($niveles as $nivel){
            DB::table('niveles')->insert([
                'nombre' => $nivel
            ]);
        }
    }
}
