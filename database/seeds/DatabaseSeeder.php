<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
          'professions',
          'users',
          'roles',
          'user_role'
      ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(ProfessionSeeder::class);
        // En este orden porque los roles deben existir antes que los usuarios
        $this->call(RoleTableSeeder::class);
        $this->call(UserSeeder::class);

    }

    public function truncateTables(array $tables){
      DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
      foreach ($tables as $table) {
          DB::table($table)->truncate();
      }
      DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }

}
