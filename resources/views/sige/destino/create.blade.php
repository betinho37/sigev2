@extends('adminlte::page')

@section('content')

{!! Form::open(['url' => 'destino/store']) !!}
<div align="center"><h3>SigeTOQ</h3></div>
<div align="center"><h5>Despesa</h5></div>
<div class="form-group" >
	{!! csrf_field() !!}
	{!!Form::label('name', 'Destino:')!!}<p></p>
	{!!Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div align="center"> 
	<button type="submit" class="btn btn-primary"> Salvar</button>
	<a href="/destino" class="btn btn-primary">Cancelar</a>
</div>
{!! Form::close() !!}
@endsection