@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <li>Nome: {{$usuario->nome}}</li>
              <li>Email: {{$usuario->email}}</li>
              Regras:
              @foreach($usuario->regras as $regra)
                <li>{{$regra->nome}}</li>
              @endforeach
            </div>
        </div>
    </div>
</div>

@stop
