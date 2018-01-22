@extends('layouts.app')
@section('content')

<form action="/home/user/new" method="POST">
  {{csrf_field()}}
  <input type="text" placeholder="Nome">
  <input type="email" placeholder="E-mail">
  <input type="password" placeholder="Senha">

  @foreach($regras as $regra)
  <input type="checkbox" name="regras[]" value="{{$regra->id}}">{{$regra->nome}}<br>
  @endforeach

  <input type="submit" value="Salvar">
@stop
