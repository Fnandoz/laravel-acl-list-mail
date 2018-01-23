<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ListaController extends Controller
{
  public function index(Request $request)
  {
    $lista = Item::all();
    return view('lista.index', ['lista'=>$lista]);
  }

  public function item(Request $request, $id)
  {
    $item = Item::find($id);
    return view('lista.item', ['item'=>$item]);
  }

  public function novo(Request $request)
  {
      if ($request->isMethod('post')) {
        $item = new Item();
        $item->titulo = $request->titulo;
        $item->descricao = $request->descricao;
        $item->save();
        return redirect('lista.index');
      }
      return view('lista.new');
  }

  public function remove(Request $request)
  {
    $item = Item::find($request->id);
    $item->delete();
    return redirect('lista.index');
  }

  public function editar(Request $request, $id)
  {
    if ($request->isMethod('post')) {
      $item = Item::find($id);
      $item->titulo = $request->titulo;
      $item->descricao = $request->descricao;
      $item->save();
      return redirect('lista.index');
    }
    $item = Item::find($request->id);
    return view('lista.edit', ['item'=>$item]);
  }
}
