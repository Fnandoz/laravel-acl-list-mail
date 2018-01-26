@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <form action="/home/user/new" method="POST">
                {{csrf_field()}}
                <input type="text" placeholder="Nome" name="nome">
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="Senha" name="senha">

                @foreach($regras as $regra)
                <input type="checkbox" name="regras[]" value="{{$regra->id}}">{{$regra->nome}}<br>
                @endforeach

                <input type="submit" value="Salvar">

              </form>
            </div>
        </div>
    </div>
</div>

@stop
