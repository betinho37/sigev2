@extends('adminlte::page')

@section('content')

{!! Form::open(['url' => 'empresas/store']) !!}
<div align="center"><h3>SigeTOQ</h3></div>
<div align="center"><h5>Empresa</h5></div>
<div class="form-group" >
	{!! csrf_field() !!}
	{!!Form::label('name', 'Empresa:')!!}<p></p>
	{!!Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div align="center"> 
	<button type="submit" class="btn btn-primary"> Salvar</button>
	<a href="/empresas" class="btn btn-primary">Cancelar</a>
</div>
{!! Form::close() !!}
@endsection