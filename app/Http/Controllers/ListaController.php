<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Item;
use App\User;

class ListaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $request->user()->autorizaRegras(['master', 'lista.view', 'lista.create', 'lista.update', 'lista.delete']);
    $lista = Item::where('user_id', '=', Auth::id())->orWhere('publico', '=', 1)->get();
    return view('lista.index', ['lista'=>$lista]);
  }

  public function item(Request $request, $id)
  {
    $request->user()->autorizaRegras(['master', 'lista.view', 'lista.update', 'lista.delete', 'lista.create']);
    $item = Item::find($id);
    $usuario = User::find($item->user_id);
    $foto = Storage::url($item->foto);
    $pdf = Storage::url($item->pdf);

    return view('lista.item', ['item'=>$item, 'usuario'=>$usuario, 'foto'=>$foto, 'pdf'=>$pdf]);
  }

  public function novo(Request $request)
  {
    $request->user()->autorizaRegras(['master', 'lista.create']);
      if ($request->isMethod('post')) {
        $path_image = $request->photo->store('public/images');
        $path_pdf = $request->pdf->store('public/pdf');

        $item = new Item();
        $item->titulo = $request->input('titulo');
        $item->descricao = $request->input('descricao');
        if ($request->input('publico')=='on') {
          $item->publico = true;
        }else{
          $item->publico = false;
        }
        $item->foto = $path_image;
        $item->pdf = $path_pdf;
        $item->user_id = Auth::id();
        $item->save();

        return redirect('/home/lista');
      }
      return view('lista.new');
  }

  public function remove(Request $request)
  {
    $request->user()->autorizaRegras(['master', 'lista.view', 'lista.delete']);
    $item = Item::find($request->id);
    $item->delete();
    return redirect('/home/lista');
  }

  public function editar(Request $request, $id)
  {
    $request->user()->autorizaRegras(['master', 'lista.view', 'lista.update']);
    if ($request->isMethod('post')) {
      $item = Item::find($id);
      $item->titulo = $request->titulo;
      $item->descricao = $request->descricao;
      $item->save();
      return redirect('/home/lista');
    }
    $item = Item::find($request->id);
    return view('lista.edit', ['item'=>$item]);
  }
}
