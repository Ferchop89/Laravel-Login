<?php

use App\Models\User;
use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //   'name'=>'Guillermo Castillo',
        //   'email'=>'gcaas@hots.com',
        //   'password'=>bcrypt('laravel'),
        //   'profession_id'=>Profession::whereTitle('Desarrollador Back-end')->value('id'),
        //   'is_admin' => true,
        // ]);

        $professionId=Profession::whereTitle('Desarrollador Back-end')->value('id');

        User::create([
          'name'=>'Guillermo Castillo',
          'email'=>'gcaas@hots.com',
          'password'=>bcrypt('laravel'),
          'profession_id'=>$professionId,
          'is_admin' => true,
        ]);

        //primer usuario con el Id superpuesto con el que habiamos calculado
        factory(User::class)->create([
          'profession_id' => $professionId
        ]);

        // Nuevo registro sin profession_id;
        factory(User::class,5)->create();

    }
}
