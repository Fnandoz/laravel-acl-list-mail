@extends('layouts.app')
@section('content')

<form action="/home/lista/{{$item->id}}/edit" method="POST">
  {{csrf_field()}}
  <input type="text" placeholder="Titulo" value="{{$item->titulo}}" name="titulo">
  <input type="text" placeholder="Descricao" value="{{$item->descricao}}" name="descricao">
  <input type="submit" value="Salvar">

@stop
