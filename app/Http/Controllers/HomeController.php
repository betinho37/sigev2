<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Pagamento;
use App\Receita;

use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mes = Carbon::now();
        $primeiroDiaDoMes = Carbon::now()->startOfMonth();
        $ultimoDiaDoMes = Carbon::now()->endOfMonth();
        /////////////////////////////////////////////
        $pagamentosmensais = DB::table('pagamentos')
        ->whereDate('data', '>=', $primeiroDiaDoMes)
        ->whereDate('updated_at', '<=', $ultimoDiaDoMes)
        ->where('situacao', '=', 1)
        ->sum('valor');

        $receitasmensais = DB::table('receita')
        ->whereDate('data', '>=', $primeiroDiaDoMes)
        ->whereDate('updated_at', '<=', $ultimoDiaDoMes)
        ->where('pagamento', '!=', null)
        ->sum('valor');

        ////////////////////////////////////////////
        $ano = Carbon::now();
        $primeiroMesDoAno = Carbon::now()->startOfYear();
        $ultimoMesDoAno  = Carbon::now()->endOfYear();
       
        $receitasanuais = DB::table('receita')
        ->whereDate('data', '>=', $primeiroMesDoAno)
        ->whereDate('updated_at', '<=', $ultimoMesDoAno)
        ->where('pagamento', '!=', null)
        ->sum('valor');
       
        $pagamentosanuais = DB::table('pagamentos')
        ->whereDate('data', '>=', $primeiroMesDoAno)
        ->whereDate('updated_at', '<=', $ultimoMesDoAno)
        ->where('situacao', '=', 1)
        ->sum('valor');
    


        return view('home', compact(
            'pagamentosmensais',
            'receitasmensais', 
            'pagamentosanuais', 
            'receitasanuais'
        ));
    }
}
