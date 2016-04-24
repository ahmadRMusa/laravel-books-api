<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'It',
            'author' => 'Stephen King',
            'description' => 'Horror',
        ]);

        DB::table('books')->insert([
            'title' => 'Lust & Wonder: A Memoir',
            'author' => 'Augusten Burroughs',
            'description' => 'Romance',
        ]);

        DB::table('books')->insert([
            'title' => 'Lab Girl',
            'author' => 'Hope Jahren',
            'description' => 'Comedy',
        ]);

        DB::table('books')->insert([
            'title' => 'Maestra',
            'author' => 'L.S. Hilton',
            'description' => 'Romance',
        ]);

        DB::table('books')->insert([
            'title' => 'Dodgers: A Novel',
            'author' => 'William Beverly',
            'description' => 'Action',
        ]);

        DB::table('books')->insert([
            'title' => 'Wonder Woman: Earth One Vol. 1',
            'author' => 'Grant Morrison',
            'description' => 'Action',
        ]);

        DB::table('books')->insert([
            'title' => 'Paper Girls Volume 1',
            'author' => 'Brian K. Vaughan',
            'description' => 'Romance',
        ]);

        DB::table('books')->insert([
            'title' => 'Green Lantern',
            'author' => 'Geoff Johns',
            'description' => 'Action',
        ]);

        DB::table('books')->insert([
            'title' => 'I am a Hero Omnibus Volume 1',
            'author' => 'Kengo Hanzawa',
            'description' => 'Heroe',
        ]);

        DB::table('books')->insert([
            'title' => 'Firelight (Amulet #7)',
            'author' => 'Kazu Kibuishi',
            'description' => 'Horror',
        ]);
    }
}
