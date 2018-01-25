@extends('layouts.app')
@section('content')

Titulo {{$item->titulo}} <br>
Descrição {{$item->descricao}}<br>
<a href="/home/user/{{$usuario->id}}">{{$usuario->email}}</a>
<br>
<img src="{{ $foto }}"  width="200px" height="200px"/>
<embed src="{{ $pdf }}" width="200px" height="400px" />

@stop
