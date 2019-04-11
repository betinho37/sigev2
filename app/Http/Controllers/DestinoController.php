<?php

namespace App\Http\Controllers;

use App\Destino;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    private  $destino;

    public function __construct(Destino $destino)
    {
        $this->destino = $destino;
    }
    public function index()
    {
        $destino = $this->destino->all();

        return view('sige.destino.index', compact('destino'));
    }
    public function create ()
    {
        return view ('sige.destino.create');

    }
    public function store(Request $request)

    {
        $inputs = $request->all();

        $this->destino->create($inputs);

        return redirect()->action('DestinoController@index');

    }
    public function destroy($id)
    {

        $destino = destino::find($id);
        $destino->delete();
        return redirect()->back();

    }
}
