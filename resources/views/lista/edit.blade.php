@extends('layouts.app')
@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <form action="/home/lista/{{$item->id}}/edit" method="POST">
                  {{csrf_field()}}
                  <input type="text" placeholder="Titulo" value="{{$item->titulo}}" name="titulo">
                  <input type="text" placeholder="Descricao" value="{{$item->descricao}}" name="descricao">
                  <input type="submit" value="Salvar">
                </form>
              </div>
          </div>
      </div>
  </div>


@stop
