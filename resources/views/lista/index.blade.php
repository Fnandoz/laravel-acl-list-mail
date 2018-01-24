@extends('layouts.app')
@section('content')

<a href="/home/lista/new">Novo</a>
<ul>
  @foreach($lista as $item)
  <li>
    {{$item->titulo}}
    {{$item->descricao}}
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

@stop
