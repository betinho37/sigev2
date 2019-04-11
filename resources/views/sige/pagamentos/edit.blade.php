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
<h1 align="Center" >Editar</h1>

{!!Form::open(['route'=>['pagamentos.update', $pagamentos->id ], 'file'=>true, 'enctype'=>'multipart/form-data', 'method'=>'put'])!!}
<div class="form-group">
	{!!Form::label('destino_id', 'Destino:')!!}
	{!!Form::select('destino_id', $list_destino, $pagamentos->destino_id, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
	{!!Form::label('name', 'Descrição:')!!}
	{!!Form::text('name', $pagamentos->name, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
	{!!Form::label('data', 'Data:')!!}<p></p>
	{!!Form::date('data', $pagamentos->data);!!}

</div>
<div class="form-group" >
	{!!Form::label('valor', 'Valor:')!!}
	{!!Form::text('valor', number_format($pagamentos->valor, 2, ',', '.'), ['class'=>'form-control'])!!}
</div>

<label>Situação:

	<input type="radio" name="situacao" value="1"
	{{isset($pagamentos->situacao) && $pagamentos->situacao == 1 ? 'checked' : '' }}
	required>Pago
</label>

<label>
	<input type="radio" name="situacao" value="0"
	{{isset($pagamentos->situacao) && $pagamentos->situacao == 0 ? 'checked' : '' }}
	required>Pendente
</label><br>
<label>Arquivo: {{$pagamentos->arquivo}}</label>
<a href="{{ route('deletar.arquivo', $pagamentos->pdf) }}" class="btn btn-primary btn-xs">Excluir Arquivo</a>

<div><label>Enviar um novo arquivo:</label>
  {!! Form::file('arquivo', array('class' => 'arquivo')) !!}
</div><br>
<div class="form-group" >
	{!!Form::submit('Salvar', ['class="btn btn-primary"'])!!}
	<a href="/pagamentos" class="btn btn-primary">Cancelar</a>
</div>



{!! Form::close() !!}



@endsection
