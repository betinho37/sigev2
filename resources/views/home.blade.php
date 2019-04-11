@extends('adminlte::page')

@section('title', 'SigeTOQ')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script src="{{ asset('js/Chart.min.js') }}"></script>

<link rel="stysheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"type="text/css">
@section('content_header')
    <h1>Relatórios</h1>
@stop

@section('content')
<div class="box box-success collapsed-box" >
            <div class="box-header with-border">
              <h3 class="box-title">Relatório Mensal</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
            
              <canvas id="myChart"  style="padding:5px;width: 1065px;height: 297px;"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
        'Receitas',
        'Despesas'
    ],
        datasets: [{
        label:'Gráfico',
        data: [{{$receitasmensais}}, {{$pagamentosmensais}}],
        backgroundColor: ["#006400", "#FF0000"]  
    }]
    }
});
</script>

<div class="box box-success collapsed-box" >
            <div class="box-header with-border">
              <h3 class="box-title">Relatório Anual</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="myChart2"  style="padding:5px;width: 1065px;height: 297px;"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
<script>
var ctx = document.getElementById("myChart2");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
        'Receitas',
        'Despesas'
    ],
        datasets: [{
        label:'Gráfico',
        data: [{{$receitasanuais}}, {{$pagamentosanuais}}],
        backgroundColor: ["#006400", "#FF0000"]  
    }]
    }
});
</script>



@stop