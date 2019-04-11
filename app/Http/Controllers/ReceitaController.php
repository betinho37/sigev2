<?php

namespace App\Http\Controllers;
use App\Receita;
use App\Empresa;
use App\Cliente;
use Illuminate\Http\Request;
use DB;
use Storage;
use File;

class ReceitaController extends Controller
{
  private $receita, $empresa, $cliente;

  public function __construct(Receita $receita, Empresa $empresa, Cliente $cliente)
  {
    $this->receita = $receita;
    $this->empresa = $empresa;
    $this->cliente = $cliente;
    $this->middleware('auth');
  }
  public function index()
  {

    $receita = $this->receita->orderBy('data', 'asc')->get();

    return view('sige.receita.index', compact('receita'));
  }
  public function create ()
  {

    $list_empresa = $this->empresa->listEmpresas();
    $list_cliente = $this->cliente->listClientes();

    return view ('sige.receita.create', compact('list_empresa', 'list_cliente'));

  }

  public function store(Request $request)
  {
    if ($file = \Input::file('arquivo')){

      $destinationPath = public_path().DIRECTORY_SEPARATOR.'uploads';
      
      $extension =  $file->getClientOriginalExtension();

      $pdf['pdf'] = str_random (30).'.'.$extension;

      $name['arquivo'] =  $file->getClientOriginalName();

      $inputs = $request->all();

      

      $file->move( $destinationPath, $pdf['pdf'], $name['arquivo'] );

      $inputs['pdf'] = $pdf['pdf'];

      $inputs['arquivo'] = $name['arquivo'];

      $inputs['valor'] = str_replace(',', '.', str_replace('.', '', $inputs['valor']));

      $this->receita->create($inputs);

      return redirect()->action('ReceitaController@index');
      
    }

    $inputs = $request->all();
    
    $inputs['valor'] = str_replace(',', '.', str_replace('.', '', $inputs['valor']));
    
    $this->receita->create($inputs);
    
    return redirect()->action('ReceitaController@index');
  }
  public function show($id)
  {

    $receita = Receita::find($id);

    return  view('sige.receita');
  }
  public function edit($id)
  {

    $list_empresa = $this->empresa->listEmpresas();
    $list_cliente = $this->cliente->listClientes();

    $receita = Receita::find($id);

    return view('sige.receita.edit', compact('receita', 'list_empresa', 'list_cliente'));
  }
  public function update(Request $request, $id)

  {


    $receita =Receita::find($id);

        if ($file = \Input::file('arquivo')){

            $destinationPath = public_path().DIRECTORY_SEPARATOR.'uploads';

            $extension =  $file->getClientOriginalExtension();

            $pdf['pdf'] = str_random (30).'.'.$extension;

            $namearquivo['arquivo'] = $file->getClientOriginalName();

            $file->move( $destinationPath, $pdf['pdf'], $namearquivo['arquivo']);

            $receita->arquivo = $namearquivo['arquivo'];

            $receita->pdf = $pdf['pdf'];

            $receita->save();

        }

        $receita->empresa_id = $request->empresa_id;

        $receita->cliente_id = $request->cliente_id;
        
        $receita->previsao = $request->previsao;

        $receita->pagamento = $request->pagamento;
        
        $receita->numerocontrato = $request->numerocontrato;

        $receita->valor = $request->valor = str_replace(',', '.', str_replace('.', '', $request['valor']));;
        $receita->data = $request->data;

        $receita->save();

      return redirect()->action('ReceitaController@index');

  }

  public function download($id)
  {

    $receita = Receita::find($id);
    $filename = $receita->arquivo;
    return response()->download(public_path("uploads/{$filename}"));

  }

  public function destroy($id)
  {
    $receita = Receita::find($id);

    if ($receita->pdf)
    {
      unlink(public_path('uploads/'. $receita->pdf));
      $receita->delete();
    }

    $receita->delete();
    return redirect()->back();
  }

  public function deletfile($name)
  {


    $receita = Receita::where('pdf', $name)->first();
    $receita->pdf = null;
    $receita->arquivo = null;
    unlink(public_path('uploads/'. $name));
    $receita->save();
    return redirect()->back();
  }
}
