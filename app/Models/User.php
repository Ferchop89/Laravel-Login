<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
// EN caso de que no estemso utilizando la convención se personalizada
// el nombre de la tabla con la siguiente sentencia.
// protected $table = 'users';

  protected $fillable = [
      'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
      'is_admin' => 'boolean'
    ];

    public function isAdmin()
    {
      return $this->email===is_admin;

    }

    public static function findByEmail($email)
    {
      return static::where(compact('email'))->first();
    }

    public  function profession() // profession + _ + id solo arroja una profesion Singular
    {
      return $this->belongsTo(Profession::class);
    }

}
