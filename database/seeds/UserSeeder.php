<?php

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $role_Invitado=Role::where('nombre','Invit')->first();
          $user=new User();
          $user->name = 'Guillermo Castillo';
          $user->email = 'gcaas@hots.com';
          $user->login = 'gcas';
          $user->password = bcrypt('laravel');
          $user->is_active = true;
          $user->save();
          $user->roles()->attach($role_Invitado);

          // usuarios aleatorios con role aleatorio
          for ($i=0; $i < 9; $i++) {
            $user_fact = factory(User::class)->create();
            $NumRoles = rand(1,4);
            for ($x=0; $x < $NumRoles; $x++) {
              $xRole = rand(1,9);
              if ($user_fact->roles()->where('role_id',$xRole)->count()==0 ){
                $user_fact->roles()->attach(rand(1,9));
              }
            }
          }

//          $user->roles()->attach($role_Invitado);

          // factory(User::class)->create();
    }
}
