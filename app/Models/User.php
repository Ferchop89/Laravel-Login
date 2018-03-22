<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email',  'password',
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

    public function hasAnyRole($roles)
    {
      if (is_array($roles))
      {
          foreach ($roles as $role) {
            if($this->hasRole($role)){
              return true;}
          }
        } else
        {
            if($this->hasRole($roles)){
              return true;}
        }
        return false;
      }

    /**
    * Check one role
    * $param string $role
    */
    public function hasRole($role)
    {
      if($this->roles()->where('nombre',$role)->first()) {
        return true;
      }
      return false;
    }

}
