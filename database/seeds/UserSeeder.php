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
        User::create([
          'name'=>'Guillermo Castillo',
          'email'=>'gcaas@hots.com',
          'login' => 'gcas',
          'password'=>bcrypt('laravel'),
          'is_active' => true,
        ]);
        // 5 nuevos  registrs;
        factory(User::class,5)->create();
    }
}
