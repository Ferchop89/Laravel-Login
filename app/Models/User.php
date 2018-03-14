<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
// EN caso de que no estemso utilizando la convención se personalizada
// el nombre de la tabla con la siguiente sentencia.
// protected $table = 'users';

// public function roles(){
//     this->belongsToMany('App\Models\Role','user_role','user_id','role_id');
// }

  protected $fillable = [
      'name', 'email', 'login', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
      'is_active' => 'boolean',
    ];

    public function Roles()
    {
      return $this->belongsTo(Role::class);
    }

}
