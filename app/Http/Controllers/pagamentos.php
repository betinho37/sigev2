<?php
namespace App\Http\Controllers;
use App\Pagamento;
use App\Empresa;
use App\Destino;
use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Validation\Rule;

class pagamentos extends Controller
{
    private $pagamentos, $empresa, $destino;
    public function __construct(Pagamento $pagamentos, Empresa $empresa, Destino $destino)

    {
        $this->pagamentos = $pagamentos;
        $this->empresa = $empresa;
        $this->destino = $destino;
        $this->middleware('auth');
    }
    public function index()

    {
        //Soma os Valores do Campo 'valor' Quando forem Pendentes
        $soma = DB::table('pagamentos')
        
        ->where('situacao', 1)
        
        ->sum('valor');
       
       
        //Ordernar Datas
        $pagamentos = $this->pagamentos->orderBy('data', 'asc')->get();
        
        return view('sige.pagamentos.index', compact('pagamentos', 'soma'));

    }


    public function create ()

    {
        $list_empresa = $this->empresa->listEmpresas();
        $list_destino = $this->destino->listDestinos();
        return view ('sige.pagamentos.create', compact('list_empresa', 'list_destino'));
    }

    public function store(Request $request)

    {
        //Upload do Arquivo
        if ($file = \Input::file('arquivo')){

        //Mover Arquivo para public/upload
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'uploads';

            $extension =  $file->getClientOriginalExtension();

            $pdf['pdf'] = str_random (30).'.'.$extension;

          //Salva Nome Verdadeiro do Arquivo
            $name['arquivo'] =  $file->getClientOriginalName();

            $inputs = $request->all();

            
            $file->move( $destinationPath,$pdf['pdf'], $name['arquivo']);

            $inputs['pdf'] = $pdf['pdf'];

            //$fileName = str_random(5).'.'.$extension; 

            $inputs['arquivo'] = $name['arquivo'];

             //Trata o Valor para Inserir no banco
            $inputs['valor'] = str_replace(',', '.', str_replace('.', '', $inputs['valor']));

            $this->pagamentos->create($inputs);

            return redirect()->action('pagamentos@index');
        }

        $inputs = $request->all();

        $inputs['valor'] = str_replace(',', '.', str_replace('.', '', $inputs['valor']));

        $this->pagamentos->create($inputs);
        
        return redirect()->action('pagamentos@index');
    }
    public function edit($id)
    {
        $list_empresa = $this->empresa->listEmpresas();
        $list_destino = $this->destino->listDestinos();
        $pagamentos = Pagamento::find($id);
        return view('sige.pagamentos.edit', compact('pagamentos', 'list_empresa', 'list_destino'));
    }
    public function update  (Request $request, $id)
    {

        $pagamentos =Pagamento::find($id);

        if ($file = \Input::file('arquivo')){

            $destinationPath = public_path().DIRECTORY_SEPARATOR.'uploads';

            $extension =  $file->getClientOriginalExtension();

            $pdf['pdf'] = str_random (30).'.'.$extension;

            $namearquivo['arquivo'] = $file->getClientOriginalName();

            $file->move( $destinationPath, $pdf['pdf'], $namearquivo['arquivo']);

            $pagamentos->arquivo = $namearquivo['arquivo'];

            $pagamentos->pdf = $pdf['pdf'];

            $pagamentos->save();

        }

        $pagamentos->empresa_id = $request->empresa_id;

        $pagamentos->destino_id = $request->destino_id;

        $pagamentos->name = $request->name;

        $pagamentos->valor = $request->valor = str_replace(',', '.', str_replace('.', '', $request['valor']));;
        $pagamentos->data = $request->data;

        $pagamentos->situacao = $request->situacao;

        $pagamentos->save();

        return redirect()->action('pagamentos@index');
    }
    public function download($id)
    {
        $pagamentos = Pagamento::find($id);
        $filename = $pagamentos->arquivo;
        return response()->download(public_path("uploads/{$filename}"));
    }
    public function destroy($id)
    {
      $pagamentos = Pagamento::find($id);

      if ($pagamentos->pdf)
      {
        unlink(public_path('uploads/'. $pagamentos->pdf));
        $pagamentos->delete();
    }

    $pagamentos->delete();
    return redirect()->back();
}

public function deletfile($name)
{


  $pagamentos = Pagamento::where('pdf', $name)->first();
  $pagamentos->pdf = null;
  $pagamentos->arquivo = null;
  unlink(public_path('uploads/'. $name));
  $pagamentos->save();
  return redirect()->back();
}

}
