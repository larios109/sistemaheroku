<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use App\Models\compania;

class companiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:ver->compania|crear->compania|editar->compania|borrar->compania',['only'=>['index']]);
        $this->middleware('permission:crear->compania',['only'=>['create','store']]);
        $this->middleware('permission:editar->compania',['only'=>['edit','update']]);
        $this->middleware('permission:borrar->compania',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://apijyt.herokuapp.com/compania');
        return view('M_cliente.compania.index')->with('companias', json_decode($response,true));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('M_cliente.compania.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'RTN'=>'required',
            'CAI'=>'required',
            'Nombre'=>'required',
            'Comercial'=>'required',
            'Pagina'=>'required',
            'Correo'=>'required',
            'Facebook'=>'required',
            'Instagram'=>'required'
        ]);

        $response = Http::post('https://apijyt.herokuapp.com/compania/insertar', [
            'compania_rtn' => $request->RTN,
            'compañia_cai' => $request->CAI,
            'compañia_legal_nom' => $request->Nombre,
            'compañia_comercial_nom' => $request->Comercial,
            'compañia_paginaweb' => $request->Pagina,
            'compañia_correo' => $request->Correo,
            'compañia_facebook' => $request->Facebook,
            'compañia_instagram' => $request->Instagram
        ]);

        return redirect()->route('compania.index');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cod_detalle_venta
     * @return \Illuminate\Http\Response
     */
    public function edit($cod_compania)
    {
        $response=Http::get('https://apijyt.herokuapp.com/compania/'.$cod_compania);
        $comapniaactu=json_decode($response->getbody()->getcontents())[0];

        $data=[];
        $data['comapniaactu']=$comapniaactu;

        return view('M_cliente.compania.edit',['comapniaactu'=>$comapniaactu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cod_compania)
    {
        $request->validate([
            'RTN'=>'required',
            'CAI'=>'required',
            'Nombre'=>'required',
            'Comercial'=>'required',
            'Pagina'=>'required',
            'Correo'=>'required',
            'Facebook'=>'required',
            'Instagram'=>'required'
        ]);

        $response = Http::put('https://apijyt.herokuapp.com/compania/actualizar/' . $cod_compania, [
            'compania_rtn' => $request->RTN,
            'compañia_cai' => $request->CAI,
            'compañia_legal_nom' => $request->Nombre,
            'compañia_comercial_nom' => $request->Comercial,
            'compañia_paginaweb' => $request->Pagina,
            'compañia_correo' => $request->Correo,
            'compañia_facebook' => $request->Facebook,
            'compañia_instagram' => $request->Instagram
        ]);

        return redirect()->route('compania.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cod_compania)
    {
        $eliminar = Http::delete('https://apijyt.herokuapp.com/compania/eliminar/'.$cod_compania);
        return redirect()->route('compania.index');
    }
}
