<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Regras;

class UserController extends Controller
{
    public function index(Request $request)
    {
      $usuarios = User::all();
      return view('users.index', ['usuarios'=>$usuarios]);
    }

    public function usuario(Request $request, $id)
    {
      $usuario = User::find($id);
      return view('users.user', ['usuario'=>$usuario]);
    }

    public function novo(Request $request)
    {
      if ($request->isMethod('post')) {
        $novo_user = new User();
        $novo_user->nome = $request->nome;
        $novo_user->email = $request->email;
        $novo_user->senha = $request->senha;
        $novo_user->save();

        if(count($request->regras) > 0){
          foreach ($request->regras as $regra) {
            $novo_user->regras()->attach(Regras::where('id', '=', $regra)->first());
          }
        }

        return redirect('/home/user');
      }

      $regras = Regras::all();
      return view('users.new', ['regras'=>$regras]);
    }

    public function remove(Request $request)
    {
      $usuario = User::find($request->id);
      $usuario->delete();
      return view('users.index');
    }

    public function editar(Request $request, $id)
    {
      if ($request->isMethod('post')) {
        $novo_user = User::find($id);
        $novo_user->nome = $request->nome;
        $novo_user->email = $request->email;
        $novo_user->senha = $request->senha;
        $novo_user->save();

        if(count($request->regras) > 0){
          foreach ($request->regras as $regra) {
            $novo_user->regras()->attach(Regras::where('id', '=', $regra)->first());
          }
        }

        return redirect('/home/user');
      }

      $usuario = User::find($id);
      $regras = Regras::all();
      return view('users.edit', ['usuario'=>$usuario, 'regras'=>$regras]);
    }


}
