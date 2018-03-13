<?php

use App\Models\User;
use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use App\Models\Profession as Profesion;


class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // DB::insert('INSERT INTO professions (title) VALUES ("Desarrollador Back-end")');
      // DB::insert('INSERT INTO professions (title) VALUES (?)',['Programador back-end']);

      //Cuando se tienen muchos parametros de debe utilizar los arreglos asociativos
      // DB::insert('INSERT INTO professions (title) VALUES (:title)',[
      //             'title' => 'Desarrollador front-end',
      //           ]);

        // DB::table('professions')->insert([
        //   'title'=>'Desarrollador Back-end',
        // ]);
        // DB::table('professions')->insert([
        //   'title'=>'Desarrollador Front-end',
        // ]);
        // DB::table('professions')->insert([
        //   'title'=>'Diseñador web',
        // ]);

        Profession::create([
          'title'=>'Desarrollador Back-end',
        ]);
        Profession::create([
          'title'=>'Desarrollador Front-end',
        ]);
        Profession::create([
          'title'=>'Desarrollador Diseñador Web',
        ]);

        // otras 17 profesiones con el factory
        factory(Profession::class)->times(17)->create();
    }
}
