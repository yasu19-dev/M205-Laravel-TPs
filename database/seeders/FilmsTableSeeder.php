<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('films')->insert([
[
'titre'=> "Film A",
'pays'=> "USA",
'annee'=> 2020,
'duree'=> "02:00:00",
'genre'=> "Action",
],
[
'titre'=> "Film B",
'pays'=> "France",
'annee'=> 2019,
'duree'=> "01:45:00",
'genre'=> "Drama",
]
    ]);


    }
}
