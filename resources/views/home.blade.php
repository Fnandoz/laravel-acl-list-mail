@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br>

                    @if(Auth::user()->checaRegras([
                    'master', 'lista.view', 'lista.create', 'lista.update', 'lista.delete',
                     'user.view', 'user.create', 'user.update', 'user.delete']))
                     <a href="/home/user">Usuários</a>
                     <a href="/home/lista">Lista</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
