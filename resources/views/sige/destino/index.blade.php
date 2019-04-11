@extends('adminlte::page')
@section('content')
<h1 align="center"></h1><br>

<div align="left" >
    <a href="/destino/create" class="btn btn-primary">Novo</a>
</div><br>

<table align="center" class="table">
    <tr>
        <th>Nome</th>
    </tr>
    @foreach( $destino as $destino )
    <tr>
        <td>{{ $destino->name  }}</td>


        <td><a href="{{@url('destino').'/destroy/'.$destino->id.''}}" class="btn btn-danger">Excluir</a></td>
    </tr>
    @endforeach
</table>

@endsection
