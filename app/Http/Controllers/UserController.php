<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Regras;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoUsuarioAdicionado;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
      $request->user()->autorizaRegras(['master', 'user.view', 'user.create', 'user.update', 'user.delete']);
      $usuarios = User::all();
      return view('users.index', ['usuarios'=>$usuarios]);
    }

    public function usuario(Request $request, $id)
    {
      $request->user()->autorizaRegras(['master', 'user.view', 'user.create', 'user.update', 'user.delete']);
      $usuario = User::find($id);
      return view('users.user', ['usuario'=>$usuario]);
    }

    public function novo(Request $request)
    {
      $request->user()->autorizaRegras(['master', 'user.create']);
      if ($request->isMethod('post')) {
        $novo_user = new User();
        $novo_user->name = $request->nome;
        $novo_user->email = $request->email;
        $novo_user->password = bcrypt($request->senha);
        $novo_user->save();

        if($request->regras){
          foreach ($request->regras as $regra) {
            $novo_user->regras()->attach(Regras::where('id', '=', $regra)->first());
          }
        }

        $when = now()->addSeconds(5);
        Mail::to($novo_user->email)->later($when, new NovoUsuarioAdicionado($novo_user));

        return redirect('/home/user');
      }

      $regras = Regras::all();
      return view('users.new', ['regras'=>$regras]);
    }

    public function remove(Request $request)
    {
      $request->user()->autorizaRegras(['master', 'user.view', 'user.delete']);
      $usuario = User::find($request->id);
      $usuario->apagaRegras();
      $usuario->delete();
      return redirect('/home/user');
    }

    public function editar(Request $request, $id)
    {
      $request->user()->autorizaRegras(['master', 'user.view', 'user.update']);
      if ($request->isMethod('post')) {
        $novo_user = User::find($id);
        $novo_user->name = $request->nome;
        $novo_user->email = $request->email;
        $novo_user->password = bcrypt($request->senha);
        $novo_user->save();
        $novo_user->apagaRegras();
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
