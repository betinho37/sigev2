@extends('adminlte::page')

@section('content')

<h1 align="Center" >Editar</h1>
<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready( function() {
		$('#celular').mask('(99).99999-9999');
		$('#telefone').mask('(99).9999-9999');
		$('#cpf').mask('999.999.999-99');
		$('#valor').mask('999.999.999');
		$('#cnpj').mask('99.999.999/9999-99');
	});
</script>
{!!Form::open(['route'=>['clientescadastrados.update', $cliente->id ], 'method'=>'put'])!!}


<div class="form-group" >
	{!!Form::label('name', 'Nome:')!!}
	{!!Form::text('name', $cliente->name, ['class'=>'form-control'])!!}
</div>

<div class="form-group" >
	{!!Form::label('cpf', 'CPF:')!!}
	{!!Form::text('cpf', $cliente->cpf, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
	{!!Form::label('cnpj', 'CNPJ:')!!}
	{!!Form::text('cnpj', $cliente->cnpj, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
	{!!Form::label('email', 'Email:')!!}
	{!!Form::email('email', $cliente->email, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
	{!!Form::label('celular', 'Celular:')!!}
	{!!Form::text('celular', $cliente->celular, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
	{!!Form::label('telefone', 'Telefone:')!!}
	{!!Form::text('telefone', $cliente->telefone, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
	{!!Form::label('pessoa', 'Pessoa de Contato:')!!}
	{!!Form::text('pessoa', $cliente->pessoa, ['class'=>'form-control'])!!}
</div>


<div align="Center" class="form-group" >
	{!!Form::submit('Salvar', ['class="btn btn-primary"'])!!}
	<a href="/clientescadastrados" class="btn btn-primary">Cancelar</a>
</div>
{!! Form::close() !!}



@endsection
