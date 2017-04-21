<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie = new \App\Category([
            'name' => 'Web development'
        ]);
        $categorie->save();

        $categorie = new \App\Category([
            'name' => 'Programming'
        ]);
        $categorie->save();

        $categorie = new \App\Category([
            'name' => 'Databases'
        ]);
        $categorie->save();

        $categorie = new \App\Category([
            'name' => 'Administration'
        ]);
        $categorie->save();
    }
}
