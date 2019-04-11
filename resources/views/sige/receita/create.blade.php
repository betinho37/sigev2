@extends('adminlte::page')

@section('content')

{!! Form::open(['url' => 'receita/store', 'files'=>'true', 'enctype'=>'multipart/form-data']) !!}
{!! csrf_field() !!}
<h1 align="center" >Receita</h1>
<head>
  <script type="text/javascript">
   $(document).ready(function()
   {
     $("#valor").maskMoney({
       prefix: "R$: ",
       decimal: ",",
       thousands: "."
     });
   });
 </script>
</head>
<div class="form-group" >
  {!!Form::label('empresa_id', 'Empresa:')!!}<p></p>
  {!!Form::select('empresa_id', $list_empresa, null, ['class'=>'form-control'])!!}    
</div>
<div class="form-group" >
  {!!Form::label('cliente_id', 'Cliente:')!!}<p></p>
  {!!Form::select('cliente_id', $list_cliente, null, ['class'=>'form-control'])!!}    
</div>
<div class="form-group" >
  {!!Form::label('data', 'Data de Emissão:')!!}<p></p>
  {!!Form::date('data', \Carbon\Carbon::now());!!}
</div>
<div class="form-group" >
  {!!Form::label('previsao', 'Previsão de Pagamento:')!!}<p></p>
  {!!Form::date('previsao', \Carbon\Carbon::now());!!}<p></p>
</div>
<div class="form-group" >
  {!!Form::label('pagamento', 'Data de Pagamento:')!!}<p></p>
  {!!Form::date('pagamento', \Carbon\Carbon::now()->format('00/00/0000'));!!}<p></p>
</div>
<div class="form-group" >
  {!!Form::label('valor', 'Valor:')!!}
  {!!Form::text('valor', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
  {!!Form::label('numerocontrato', 'Contrato:')!!}
  {!!Form::text('numerocontrato', null, ['class'=>'form-control'])!!}
</div>
<div>
  {!! Form::file('arquivo', array('class' => 'arquivo')) !!}
</div>
<div align="center"> 
  <button type="submit" class="btn btn-primary"> Salvar </button>
  <a href="/receita" class="btn btn-primary">Cancelar</a>
</div>

{!! Form::close() !!}
@endsection