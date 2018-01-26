@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              Titulo {{$item->titulo}} <br>
              Descrição {{$item->descricao}}<br>
              <a href="/home/user/{{$usuario->id}}">{{$usuario->email}}</a>
              <br>
              @if($foto!="/storage/0")
              <img src="{{ $foto }}"  width="200px" height="200px"/>
              @endif

              @if($pdf!="/storage/0")
              <embed src="{{ $pdf }}" width="200px" height="400px" />
              @endif
            </div>
        </div>
    </div>
</div>

@stop
