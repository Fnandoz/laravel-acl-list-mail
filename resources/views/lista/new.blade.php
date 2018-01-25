@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <form action="/home/lista/new" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="text" placeholder="Titulo" name="titulo" class="form-control">
                <input type="text" placeholder="Descricao" name="descricao" class="form-control">
                Público<input type="checkbox" name="publico">
                <br>Imagem<input type="file" name="photo" id="photo">
                PDF<input type="file" name="pdf" id="pdf">
                <input type="submit" value="Salvar" class="form-control">
            </div>
      </div>
    </div>
  </div>

@stop
