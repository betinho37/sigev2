@extends('adminlte::page')
@section('content')
<h1 align="center" >Clientes</h1>


<!-- Buscar Usuarios
    <div align="right" id="buscar">
        <form method="get" action="{{route('ClientesController.search')}}, ">
        {!!Form::label('buscar', 'Buscar:')!!}
        <input type="search" name="busca">
        {{Form::select('cliente', ['name' => 'Nome', 'cpf' => 'CPF', 'cnpj' => 'CNPJ'])}}
    </div>
-->

<div align="left" >
    <a href="/cliente/create" class="btn btn-primary">Novo</a>
</div><br>
<table align="center" class="table">
    <th>Nome</th>
    <th>CPF</th>
    <th>CNPJ</th>
    <th>Email</th>
    <th>Celular</th>
    <th>Telefone</th>
    <th>Pessoa de Contato</th>
    <th>Opcões</th>
</tr>

@foreach($cliente as $cliente)
<tr>
    <td>{{ $cliente->name  }}</td>
    <td>{{ $cliente->cpf  }}</td>
    <td>{{ $cliente->cnpj  }}</td>
    <td>{{ $cliente->email  }}</td>
    <td>{{ $cliente->celular  }}</td>
    <td>{{ $cliente->telefone  }}</td>
    <td>{{ $cliente->pessoa  }}</td>
    <td><a href="{{@url('clientescadastrados').'/edit/'.$cliente->id.''}}" class="btn btn-primary">Editar</a>
        <a href="{{@url('clientescadastrados').'/destroy/'.$cliente->id.''}}" class="btn btn-danger">Excluir</a></td>
    </tr>
    @endforeach
</table>
@endsection
