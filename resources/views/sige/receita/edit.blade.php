@extends('adminlte::page')

@section('content')
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
{!!Form::open(['route'=>['receita.update', $receita->id ], 'file'=>true, 'enctype'=>'multipart/form-data', 'method'=>'put'])!!}
<h3>Receber</h3>
<div class="form-group" >
  {!! csrf_field() !!}
</div>
{!! csrf_field() !!}
<div class="form-group" >
  {!!Form::label('empresa_id', 'Empresa:')!!}<p></p>
  {!!Form::select('empresa_id', $list_empresa, $receita->empresa_id, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
    {!!Form::label('cliente_id', 'Cliente:')!!}<p></p>
    {!!Form::select('cliente_id', $list_cliente, $receita->cliente_id, ['class'=>'form-control'])!!}
</div>

<div class="form-group" >
    {!!Form::label('data', 'Data de Emissão:')!!}<p></p>
    {!!Form::date('data', $receita->data);!!}
</div>
<div class="form-group" >
    {!!Form::label('previsao', 'Previsão de Pagamento:')!!}<p></p>
    {!!Form::date('previsao', $receita->previsao);!!}
</div>
<div class="form-group" >
    {!!Form::label('pagamento', 'Data do Pagamento::')!!}<p></p>
    {!!Form::date('pagamento', $receita->pagamento);!!}
</div>
<div class="form-group" >
 {!!Form::label('valor', 'Valor:')!!}
 {!!Form::text('valor', number_format($receita->valor, 2, ',', '.'), ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
    {!!Form::label('numerocontrato', 'Numero do Contrato:')!!}
    {!!Form::text('numerocontrato', $receita->numerocontrato, ['class'=>'form-control'])!!}
</div>

<label ><font color="black">Arquivo: {{$receita->arquivo}}</label></font>

<a href="{{ route('excluir.arquivo', $receita->pdf) }}" class="btn btn-primary btn-xs">Excluir Arquivo</a>
<div><label><font color="black">Enviar um novo arquivo:</label></font>

  {!! Form::file('arquivo', array('class' => 'arquivo')) !!}
</div><br>
<div align="center">
    <button type="submit" class="btn btn-primary"> Salvar</button>
    <a href="/receita" class="btn btn-primary">Cancelar</a>
</div>

{!! Form::close() !!}
@endsection
