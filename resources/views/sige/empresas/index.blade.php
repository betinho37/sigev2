@extends('adminlte::page')
@section('content')
<h1 align="center" >Empresas</h1><br>

<div align="left">
    <a href="/empresas/create" class="btn btn-primary">Novo</a>
</div><br>
<table align="center" class="table">
    <tr>
        <th>Nome</th>
    </tr>
    @foreach( $empresa as $empresa )
    <tr>
        <td>{{ $empresa->name  }}</td>
        <td><a href="{{@url('empresas').'/destroy/'.$empresa->id.''}}" class="btn btn-danger">Excluir</a></td>
    </tr>
    @endforeach
</table>
@endsection
