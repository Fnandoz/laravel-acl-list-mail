@extends('layouts.app')
@section('content')

<form action="/home/lista/new" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  <input type="text" placeholder="Titulo" name="titulo">
  <input type="text" placeholder="Descricao" name="descricao">
  <br>Público<input type="checkbox" name="publico">
  <br>Imagem<input type="file" name="photo" id="photo">
  PDF<input type="file" name="pdf" id="pdf">
  <input type="submit" value="Salvar">

@stop
