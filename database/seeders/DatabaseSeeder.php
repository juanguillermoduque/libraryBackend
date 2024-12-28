<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //Se crean 3 libros base para poblar la bd
    DB::table('books')->insert([
        [
            'title' => 'El señor de los anillos',
            'author' => 'J.R.R. Tolkien',
            'date_post' => '1954-07-29',
            'genre' => 'Fantasia',
        ],
        [
            'title' => 'Harry Potter y la piedra filosofal',
            'author' => 'J.K. Rowling',
            'date_post' => '1997-06-26',
            'genre' => 'Fantasia',
        ],
        [
            'title' => 'Cien años de soledad',
            'author' => 'Gabriel García Márquez',
            'date_post' => '1967-05-30',
            'genre' => 'Realismo mágico',
        ]
    ]);
    }
}
