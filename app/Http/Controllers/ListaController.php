<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoItem;
use App\Mail\ApagaItem;
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
          $item = new Item();

        if ($request->hasFile('photo')) {
          $path_image = $request->photo->store('public/images');
          $item->foto = $path_image;
        }else {
          $item->foto = 0;
        }
        if ($request->hasFile('pdf')) {
          $path_pdf = $request->pdf->store('public/pdf');
          $item->pdf = $path_pdf;
        }else {
          $item->pdf = 0;
        }

        $item->titulo = $request->input('titulo');
        $item->descricao = $request->input('descricao');

        if ($request->input('publico')=='on') {
          $item->publico = true;
        }else{
          $item->publico = false;
        }

        $item->user_id = Auth::id();
        $item->save();

        $when = now()->addSeconds(5);
        Mail::to($request->user())->later($when, new NovoItem($item));
        return redirect('/home/lista');
      }
      return view('lista.new');
  }

  public function remove(Request $request)
  {
    $request->user()->autorizaRegras(['master', 'lista.view', 'lista.delete']);
    $item = Item::find($request->id);

    //$when = now()->addSeconds(5);
    //Mail::to($request->user())->later($when, new ApagaItem('A'));

    Storage::delete($item->foto);
    Storage::delete($item->pdf);
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
