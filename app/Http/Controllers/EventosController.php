<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use Illuminate\Support\Facades\Redirect;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();
        $dato = Event::where('usuario_id', '=', $usuario->id)->where('activo','=','1')->get();
        return view('eventos.index',['datos'=>$dato]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
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
            'descripcion'=>'required|string|max:1000',
            'fecha' => 'required',
            'hora_inicio'=>'required',
            'hora_final'=>'required',
            'proyector'=>'required',
            'sala_id'=>'required',
        ]);

        $evento = new Event;
        $evento->nombre = $request->get('nombre');
        $evento->descripcion = $request->get('descripcion');
        $evento->fecha = $request->get('fecha');
        $evento->hora_inicio = $request->get('hora_inicio');
        $evento->hora_final = $request->get('hora_final');
        $evento->proyector = $request->get('proyector');
        $evento->estado='no confirmado';
        $evento->activo=1;
        $evento->sala_id=$request->get('sala_id');
        $evento->usuario_id= Auth::user()->id;
        $evento->save();
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $datos = Event::find($id);
        return view("eventos.edit",['datos'=>$datos]);
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
        $evento = Event::find($id);
        //$this->authorize('pass',$event);

        $credentials=$this->validate(request(),[
            'nombre' => 'required|string',
            'descripcion'=>'required',
            'fecha'=>'required',
            'hora_inicio'=>'required',
            'hora_final'=>'required',
            'proyector'=>'required',
        ]);

        $evento = Event::findOrFail($id);;
        $evento->nombre = $request->get('nombre');
        $evento->descripcion = $request->get('descripcion');
        $evento->fecha = $request->get('fecha');
        $evento->hora_inicio = $request->get('hora_inicio');
        $evento->hora_final = $request->get('hora_final');
        $evento->proyector = $request->get('proyector');
        $evento->estado='no confirmado';
        $evento->activo=1;
        $evento->sala_id=$evento->sala_id;
        $evento->usuario_id= Auth::user()->id;
        $evento->update();
        return Redirect::to('eventos');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Event::findOrFail($id);
        $evento->activo = 0;
        $evento->update();
        return Redirect::to('eventos');
    }
}
