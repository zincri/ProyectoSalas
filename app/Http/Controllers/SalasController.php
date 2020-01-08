<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Sala;

class SalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $datos = Sala::where('activo','=',1)->get();
        return view("content.salas.index",['datos'=>$datos]); 
    }

    public function index_usuarios_generales()
    {
            $datos = Sala::where('activo','=',1)->get();
            return view("content.salas.index",['datos'=>$datos]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('content.salas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials=$this->validate(request(),[
            'nombre'=>'required|string|max:30',
            'edificio'=>'required|string|max:1000',
        ]);
        
        $sala=new Sala;
        $sala->nombre=$request->get('nombre');
        $sala->edificio=$request->get('edificio');
        $sala->activo=1;
        $sala->save();
        return Redirect::to('salas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("content.eventos.create",['id'=>$id]);
    }

    public function crear_evento($id)
    {
        return view("content.eventos.create",['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Sala::find($id);
        return view("content.salas.edit",['datos'=>$datos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials=$this->validate(request(),[
            'nombre'=>'required|string|max:30',
            'edificio'=>'required|string|max:1000',
        ]);
        $sala = Sala::findOrFail($id);
        $sala->nombre=$request->get('nombre');
        $sala->edificio=$request->get('edificio');
        $sala->update();
        return Redirect::to('salas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
        $sala->activo = 0;
        $sala->update();
        return Redirect::to('salas');
    }
}
