<?php

namespace App\Http\Controllers;
use App\Empresa;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    private  $empresa;

    public function __construct( Empresa $empresa)
    {
        $this->empresa = $empresa;
        $this->middleware('auth');
    }
    public function index()
    {
        $empresa = $this->empresa->all();
        return view('sige.empresas.index', compact('empresa'));
    }
    public function create ()
    {
        return view ('sige.empresas.create');

    }
    public function store(Request $request)

    {
        $inputs = $request->all();

      $this->empresa->create($inputs);

      return redirect()->action('EmpresasController@index');

    }

    public function edit($id)
    {

        $empresa = empresa::find($id);

        return view('sige.empresas.edit', compact('empresa'));
    }


    public function destroy($id)
    {

        $empresa = empresa::find($id);
        $empresa->delete();
        return redirect()->back();

    }
}
