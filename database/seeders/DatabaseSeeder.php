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
            'password' => '$2y$10$AQC/PNazy7NgSqMLdMDkOOyIU2qMokbFcAic.j8m6E7bHqQSlOeoG',
            'fazenda_id' => 1,
            'admin' => '1',
        ]);
    }
}
