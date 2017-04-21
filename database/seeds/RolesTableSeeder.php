<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->name = 'admin';
        $role->save();

        $role = new \App\Role();
        $role->name = 'regular';
        $role->save();
    }
}
