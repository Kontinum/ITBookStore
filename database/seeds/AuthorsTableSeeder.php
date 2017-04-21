<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = new \App\Author([
            'name' => 'Luke Welling'
        ]);
        $author->save();

        $author = new \App\Author([
            'name' => 'Laura Thomson'
        ]);
        $author->save();

        $author = new \App\Author([
            'name' => 'Paul DuBois'
        ]);
        $author->save();

        $author = new \App\Author([
            'name' => 'Herbert Schildt'
        ]);
        $author->save();

        $author = new \App\Author([
            'name' => 'Rachel Andrew'
        ]);
        $author->save();
    }
}
