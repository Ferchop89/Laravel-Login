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

    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    /**
    * @param string|array $roles
    */
    public function authorizedRoles($roles){
      if (is_array($roles)){
        return  $this->hasAnyRole($roles) ||
                abort(401,'This action is unauthorized.');
      }
      return  $this->hasRole($roles) ||
              abort(401,'This action es unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles){
      return null !== $this->roles()->whereIn('nombre',$roles)->first();
    }
    /**
    * Check one role
    * $param string $role
    */
    public function hasRole($role){
      return null !== $this->roles()->where('nombre',$role)->first();
    }

}
