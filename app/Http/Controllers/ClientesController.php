<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use DB;



class ClientesController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->middleware('auth');
    }


    public function index()

    {

        $cliente = $this->cliente->all();
        
        return view('sige.clientescadastrados.index', compact('cliente'));

    }
    public function create ()
    {
        return view ('sige.clientes.create');
    }

    public function store(Request $request)

    {
        $inputs = $request->all();

        $this->cliente->create($inputs);

        return redirect()->action('ClientesController@index');

    }
    public function edit($id)
    {

        $cliente = cliente::find($id);

        return view('sige.clientescadastrados.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        unset($inputs['_method']);
        unset($inputs['_token']);

        DB::table('clientes')
        ->where('id', $id)
        ->update($inputs);

       /*$cliente = cliente::find($id);

        $cliente->update($cliente)
        $cliente->name = $request->name;
        $cliente->cpf = $request->cpf;
        $cliente->cnpj = $request->cnpj;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->telefone = $request->telefone;
        $cliente->pessoa = $request->pessoa;
        $cliente->save();*/

       return redirect()->action('ClientesController@index');
    }
    public function destroy($id)
    {

        $cliente = cliente::find($id);
        $cliente->delete();
        return redirect()->back();

    }
    public function search()
    {
       $query = request()->query();

       $cliente = Cliente::where($query['cliente'], $query['busca'])->get();

       return view('sige.clientescadastrados.index', compact('cliente'));
   }

}
