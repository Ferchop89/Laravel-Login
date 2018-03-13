<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
      $users = User::all();

      $title = 'Listado de Usuarios';

      return view('users.index', compact('title','users'));
    }

    public function show(User $user)
    {
      // dd($user); // para comprobar resultados. si aparece el usuario
      return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $data = request()->validate([
          'name' => 'required',
          'email' => ['required','email','unique:users,email'],
          'password' => ['required','min:6'],
          ],[
          'name.required' => 'El campo nombre es obligatorio',
          'email.required' => 'El campo email es obligatorio',
          'email.email' => 'El campo email no es valido',
          'email.unique' => 'Este correo ya ha sido utilizado',
          'password.required' => 'El campo password es obligatorio',
          'password.min' => 'El password minimo es de 6 caracteres'
        ]);
        //$data = request()->all(); //Con esto funcional la prueba pero no la validacion
        User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
        ]);

      return redirect()->route('users');  // redireccionamos al listado de usuarios
    }

    function edit(User $user)
    {
        return view('users.edit',['user'=> $user]);
    }

    function update(User $user)
    {
        // $data = request()->all(); // no se debe usar
        $data = request()->validate([
          'name' => 'required',
          // El tercer parametro $user->id se va a excluir de la prueba puesto que no permtia que se pudiera
          // validar que el email fuera único cuando se estaba actualizando el registro.
          // 'email' => 'required|email|unique:users,email,'.$user->id, //mejorando la legimiblida
          'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
          'password' => '',
        ]);

        if($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        } else {
              unset($data['password']);
        }

        $user->update($data);

       // return redirect("usuarios/{$user->id}");
       return redirect()->route('users.show',['user'=>$user]); // Eloquet toma el Id por lo que se pudo especificar explicitamente $user->id
    }

    function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users'); // equivalente a la ruta 'usuarios'
    }

 public function prueba(){return view('users.h');}

}
