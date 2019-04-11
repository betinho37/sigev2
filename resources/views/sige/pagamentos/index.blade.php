@extends('adminlte::page')
@section('content')
<head>


    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready( function() {
            $('#data').mask('d/m/Y');
        });
    </script>


    <h1 align="center" >Despesas</h1><br>
</head>

<div align="left" >

    <a href="/pagamentos/create" class="btn btn-primary">Novo</a>

</div><br>

<table align="center" class="table">

    <tr>
        <th>Destino</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th>Vencimento</th>
        <th>Situação</th>
        <th>Arquivo</th>
        <th>Opcões</th>
    </tr>
    @foreach( $pagamentos as $pagamentos )
    <tr>
        <td>{{ $pagamentos->destino->name  }}</td>
        <td>{{ $pagamentos->name  }}</td>
        <td>{{  'R$ '. number_format($pagamentos->valor, 2, ',', '.') }} </td>
        <td>{{  date( 'd/m/Y' , strtotime($pagamentos->data  ))}} </td>
        <td>{{isset($pagamentos->situacao) && $pagamentos->situacao == 0 ? 'Pendente' : 'Pago' }}</td>

        <td><a href={{ ("uploads/{$pagamentos->pdf}") }} download="{{$pagamentos->arquivo}}" >{{$pagamentos->arquivo}}</a></td>

        <td><a href="{{@url('pagamentos').'/'. $pagamentos->id . '/edit'}}" class="btn btn-primary">Editar</a></td>
        <td>
            <form action="{{ URL::route('pagamentos.destroy', $pagamentos->id) }}" method="POST">
               <input type="hidden" name="_method" value="DELETE" >
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <button class="btn btn-danger">Excluir</button>
           </form>

       </td>
   </tr>
   @endforeach

</table>
<h4 align="center">Total Pendente:{{'R$ '. number_format($soma, 2, ',', '.')}}</h4>

@endsection
