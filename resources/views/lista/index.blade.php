@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <a href="/home/lista/new">Novo</a>
              <ul>
                @foreach($lista as $item)
                <li>
                  {{$item->titulo}}
                  <a href="/home/lista/{{$item->id}}">Ver</a>
                  <a href="/home/lista/{{$item->id}}/edit">Editar</a>
                  <form action="/home/lista/remove" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="submit" value="Remover">
                  </form>
                </li>
                @endforeach
              </ul>
            </div>
        </div>
    </div>
</div>

@stop
