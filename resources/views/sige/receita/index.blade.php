@extends('adminlte::page')
@section('content')

<h1 align="center" >Receitas</h1><br>
<div align="left"  >

    <a  href="/receita/create" class="btn btn-primary">Novo</a>


</div><br>

<table  align="center"  class="table">
    <tr>
        <th>Empresa</th>
        <th>Cliente</th>
        <th>Valor</th>
        <th>Data de Emissão</th>
        <th>Previsão de Pagamento</th>
        <th>Data de Pagamento</th>
        <th>Contrato</th>
        <th>Arquivo</th>
        <th>Opções</th>
    </tr>
    @foreach( $receita as $receita )
    <tr>
        <td>{{ $receita->empresa->name  }}</td>
        <td>{{ $receita->cliente->name  }}</td>
        <td>{{   'R$ '. number_format($receita->valor, 2, ',', '.') }} </td>
        <td>{{  date( 'd/m/Y' , strtotime($receita->data  ))}} </td>
        <td>{{  date( 'd/m/Y' , strtotime($receita->previsao  ))}}</td>
        <td>{{($receita->pagamento ? date('d/m/Y', strtotime($receita->pagamento)) : '')}}</td>
        <td>{{ $receita->numerocontrato  }}</td>
        <td><a href={{ ("uploads/{$receita->pdf}") }} download="{{$receita->arquivo}}" >{{$receita->arquivo}}</a></td>
        <td><a href="{{@url('receita').'/edit/'.$receita->id.''}}" class="btn btn-primary">Editar</a>
            <a href="{{@url('receita').'/destroy/'.$receita->id.''}}" class="btn btn-danger">Excluir</a></td>
        </tr>
        @endforeach
    </table>

    @endsection
