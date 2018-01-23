@extends('layouts.app')
@section('content')

<form action="/home/lista/new" method="POST">
  {{csrf_field()}}
  <input type="text" placeholder="Titulo" name="titulo">
  <input type="text" placeholder="Descricao" name="descricao">
  <input type="submit" value="Salvar">

@stop
