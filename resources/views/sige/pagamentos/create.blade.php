@extends('adminlte::page')

@section('content')
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  <script src="jquery.maskMoney.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(function() {
    $('#valor').maskMoney('valor', 1999.99);
  });
 </script>

 
</head>

{!! Form::open(array('url' => 'pagamentos','files'=>'true', 'enctype'=>'multipart/form-data')); !!}
{!! csrf_field() !!}
<div align="center"><h3>SigeTOQ</h3></div>
<div align="center"><h5>Despesas</h5></div>
<div class="form-group" >
  {!!Form::label('destino_id', 'Destino:')!!}<p></p>
  {!!Form::select('destino_id', $list_destino, null, ['class'=>'form-control'])!!}    
</div>
<div class="form-group" >

  {!!Form::label('name', 'Descrição:')!!}<p></p>
  {!!Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group" >
  {!!Form::label('data', 'Data:')!!}<p></p>
 {!!Form::date('data', \Carbon\Carbon::now());!!}
</div>

<div >
  {!!Form::label('valor', 'Valor:')!!}
  {!!Form::text('valor', null, ['class'=>'form-control'])!!}
</div><p></p>
<div>
{!!Form::label('situacao', 'Situacao:')!!}
{!!Form::label('situacao', 'Pago:')!!}
{!!Form::radio('situacao', '1')!!}
{!!Form::label('situacao', 'Pendente:')!!}
{!!Form::radio('situacao', '0')!!}
</div>
<div>
  {!! Form::file('arquivo', array('class' => 'arquivo')) !!}
</div>
<div align="center"> 
  <button type="submit" class="btn btn-primary">Salvar</button>
  <a href="/pagamentos" class="btn btn-primary">Cancelar</a>
</div>

{!! Form::close() !!}
@endsection