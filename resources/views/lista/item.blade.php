@extends('layouts.app')
@section('content')

Titulo {{$item->titulo}} <br>
Descrição {{$item->descricao}}<br>
<a href="/home/user/{{$usuario->id}}">{{$usuario->email}}</a>

@stop
