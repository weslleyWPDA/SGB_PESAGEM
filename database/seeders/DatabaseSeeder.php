<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\fornecedor::factory(50000)->create();

        \App\Models\Fazenda::create([
            'id' => '1',
            'name' => 'FAZ. BARRA BONITA',
            'proprietario' => 'SIDNEY GASQUES BORDONE',
            'zona' => 'ZONA RURAL',
            'cidade' => "MIRASSOL D OESTE - MT",
            'cep' => '78280-000',
        ]);
        \App\Models\User::create([
            'name' => 'ADMIN',
            'password' => 'admin',
            'fazenda_id' => 1,
            'admin' => '1',
        ]);
        \App\Models\produto::create([
            'name' => 'MILHO',

        ]);
        \App\Models\produto::create([
            'name' => 'RAÇÃO',

        ]);
        \App\Models\fornecedor::create([
            'name' => 'MALAPO',

        ]);
        \App\Models\fornecedor::create([
            'name' => 'JOSE CUNHAS',

        ]);
    }
}
