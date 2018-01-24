@extends('layouts.app')
@section('content')

<a href="/home/user/new">Novo</a>
<ul>
  @foreach($usuarios as $usuario)
    <li>
      {{$usuario->nome}}
      {{$usuario->email}}
      <a href="/home/user/{{$usuario->id}}">Ver</a>
      <a href="/home/user/{{$usuario->id}}/edit">Editar</a>
      <form action="/home/user/remove" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$usuario->id}}">
        <input type="submit" value="Remover">
      </form>
      <ul>
      @foreach($usuario->regras as $regra)
        <li>{{$regra->nome}}</li>
      @endforeach
      </ul>
    </li>
  @endforeach
</ul>
@stop
