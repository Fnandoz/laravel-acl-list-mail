Bem vindo, {{$usuario->name}}
<br>
Acesse sua conta através do E-mail {{$usuario->email}}

<br>
Suas permissões:

<ul>
  @foreach($usuario->regras as $regra)
    <li>{{$regra->nome}}</li>
  @endforeach
</ul>
