@extends('layouts.app')
@section('content')


<li>Nome: {{$usuario->nome}}</li>
<li>Email: {{$usuario->email}}</li>
Regras:
@foreach($usuario->regras as $regra)
  <li>{{$regra->nome}}</li>
@endforeach

@stop
