<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Event;
use App\Gallery;
use App\User;
class EventosController extends Controller
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
        if(Auth::user()->rol=='admin')
        {
            $dato=Event::where('activo','=',1)->get();
            return view('content.eventos.index',['datos'=>$dato]);
        }
        else{
            $usuario = Auth::user();
            $dato = Event::where('usuario_id', '=', $usuario->id)->where('activo','=','1')->get();

            return view('content.eventos.index',['datos'=>$dato]);
        }
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
            'fecha' => 'required|date|after:today',
            'proyector'=>'required',
            'sala_id'=>'required',
            'hora_inicio' => 'required',
            'hora_final' => 'required|after:hora_inicio',
        ]);

        $fecha = $request->get('fecha');
        $hora_inicio = $request->get('hora_inicio');
        $hora_final = $request->get('hora_final');
        $sala_id = $request->get('sala_id');
            //Este if valida que la hora inicio no sea menor a 7am y la hora final no sea mayor a 9pm.
            if(self::hourIsBetweenValidation('07:00:00', '21:00:00', $hora_inicio) &&
                self::hourIsBetweenValidation('07:00:00', '21:00:00', $hora_final)){
                //Este if valida que la diferencia minima de un evento sean 30 minutos
                $hf = \DateTime::createFromFormat('!H:i:s', $hora_final);
                $hi = \DateTime::createFromFormat('!H:i:s', $hora_inicio);
                $r=($hf->diff($hi));
                if($r->format('%H:%I:%S')>='00:30:00'){
                    /* Tenemos que obtener de la base de datos
                    los eventos con estado activo=1 y estatus=confirmado
                    de la sala solicitada, ya que estos son los 
                    eventos que ya se haran. Si la fecha y hora coinciden
                    con los eventos que existen en la base de datos
                    entonces el evento no puede crearse. */

                    //Traemos los registros de la base de datos.
                    $events = Event::where('activo','=',1)
                    ->where('status_id','=',3)
                    ->where('sala_id','=',$sala_id)
                    ->where('fecha','=',$fecha)->get();

                    if(count($events)==0){
                        $evento = new Event;
                        $evento->nombre = $request->get('nombre');
                        $evento->descripcion = $request->get('descripcion');
                        $evento->fecha = $request->get('fecha');
                        $evento->hora_inicio = $request->get('hora_inicio');
                        $evento->hora_final = $request->get('hora_final');
                        $evento->proyector = $request->get('proyector');
                        $evento->estado='no confirmado'; //Este campo no sirve
                        $evento->activo=1;
                        $evento->sala_id=$request->get('sala_id');
                        $evento->usuario_id= Auth::user()->id;
                        $evento->status_id=2; //este uno pertenece al estado no confirmado del catalogo status
                        $evento->save();
                        return Redirect::to('eventos');
                    }else{
                            //Tenemos que comparar los horarios de los eventos que existen en la fecha solicitada.
                            $flag = false; //Bandera para saber si se puede o no crear el evento.
                            foreach($events as $item){
                        
                                if(self::hourIsBetween($item->hora_inicio, $item->hora_final, $hora_inicio) ||
                                    self::hourIsBetween($item->hora_inicio, $item->hora_final, $hora_final)){
                                    $flag=true;
                                }
                            }
                            //Este if pregunta si existe un evento en el rango escogido
                            if($flag==true){
                                return back()->withErrors(['hora_inicio'=> trans('El horario solicitado ya se encuentra ocupado.'),
                                'hora_final'=> trans('El horario solicitado ya se encuentra ocupado.')]);
                            }
                            else{
                                $evento = new Event;
                                $evento->nombre = $request->get('nombre');
                                $evento->descripcion = $request->get('descripcion');
                                $evento->fecha = $request->get('fecha');
                                $evento->hora_inicio = $request->get('hora_inicio');
                                $evento->hora_final = $request->get('hora_final');
                                $evento->proyector = $request->get('proyector');
                                $evento->estado='no confirmado'; //Este campo no sirve
                                $evento->activo=1;
                                $evento->sala_id=$request->get('sala_id');
                                $evento->usuario_id= Auth::user()->id;
                                $evento->status_id=2; //este uno pertenece al estado no confirmado del catalogo status
                                $evento->save();
                                return Redirect::to('eventos');
                            }
                    }
                }
                else{
                    return back()->withErrors(['hora_inicio'=> trans('El horario minimo para ocupar una sala es de 30 minutos.'),
                                'hora_final'=> trans('El horario minimo para ocupar una sala es de 30 minutos.')]);
                }
            }
            else{
                return back()->withErrors(['hora_inicio'=> trans('Recuerda que la disponibilidad para usar la sala es de 7 Hrs a 21 Hrs.'),
                                'hora_final'=> trans('Recuerda que la disponibilidad para usar la sala es de 7 Hrs a 21 Hrs.')]); 
            }
    }

    public function hourIsBetween($from, $to, $input) {
        $dateFrom = \DateTime::createFromFormat('!H:i:s', $from);
        $dateTo = \DateTime::createFromFormat('!H:i:s', $to);
        $dateInput = \DateTime::createFromFormat('!H:i:s', $input);
        if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
        //return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
        return ($dateFrom < $dateInput && $dateInput < $dateTo) || ($dateFrom < $dateInput->modify('+1 day') && $dateInput < $dateTo);
    
    }

    public function hourIsBetweenValidation($from, $to, $input) {
        $dateFrom = \DateTime::createFromFormat('!H:i:s', $from);
        $dateTo = \DateTime::createFromFormat('!H:i:s', $to);
        $dateInput = \DateTime::createFromFormat('!H:i:s', $input);
        if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
        return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
        //return ($dateFrom < $dateInput && $dateInput < $dateTo) || ($dateFrom < $dateInput->modify('+1 day') && $dateInput < $dateTo);
    
    }


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Event::find($id);
        $fotos = Gallery::where('activo','=','1')->where('evento_id','=',$id)->get();
        
        return view("content.eventos.show",['datos'=>$datos,'fotos'=>$fotos]);
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
        return view("content.eventos.edit",['datos'=>$datos]);
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
            'descripcion'=>'required|string|max:1000',
            'fecha' => 'required|date|after:today',
            'hora_inicio'=>'required',
            'hora_final'=>'required|after:hora_inicio',
            'proyector'=>'required',
        ]);
        $evento = Event::findOrFail($id);
        $fecha = $request->get('fecha');
        $hora_inicio = $request->get('hora_inicio');
        $hora_final = $request->get('hora_final');
        $sala_id = $evento->sala_id;

        //Este if valida que la hora inicio no sea menor a 7am y la hora final no sea mayor a 9pm.
        if(self::hourIsBetweenValidation('07:00:00', '21:00:00', $hora_inicio) &&
        self::hourIsBetweenValidation('07:00:00', '21:00:00', $hora_final)){
        //Este if valida que la diferencia minima de un evento sean 30 minutos
        $hf = \DateTime::createFromFormat('!H:i:s', $hora_final);
        $hi = \DateTime::createFromFormat('!H:i:s', $hora_inicio);
        $r=($hf->diff($hi));
        if($r->format('%H:%I:%S')>='00:30:00'){
            /* Tenemos que obtener de la base de datos
            los eventos con estado activo=1 y estatus=confirmado
            de la sala solicitada, ya que estos son los 
            eventos que ya se haran. Si la fecha y hora coinciden
            con los eventos que existen en la base de datos
            entonces el evento no puede crearse. */

            //Traemos los registros de la base de datos.
            $events = Event::where('activo','=',1)
            ->where('status_id','=',3)
            ->where('sala_id','=',$sala_id)
            ->where('fecha','=',$fecha)->get();

            if(count($events)==0){
                //$evento = Event::findOrFail($id);
                $evento->update($request->all());
                return Redirect::to('eventos');
            }else{
                    //Tenemos que comparar los horarios de los eventos que existen en la fecha solicitada.
                    $flag = false; //Bandera para saber si se puede o no crear el evento.
                    foreach($events as $item){
                
                        if(self::hourIsBetween($item->hora_inicio, $item->hora_final, $hora_inicio) ||
                            self::hourIsBetween($item->hora_inicio, $item->hora_final, $hora_final)){
                            $flag=true;
                        }
                    }
                    //Este if pregunta si existe un evento en el rango escogido
                    if($flag==true){
                        return back()->withErrors(['hora_inicio'=> trans('El horario solicitado ya se encuentra ocupado.'),
                                'hora_final'=> trans('El horario solicitado ya se encuentra ocupado.')]);
                    }
                    else{
                        //$evento = Event::findOrFail($id);
                        $evento->update($request->all());
                        return Redirect::to('eventos');
                    }
            }
        }
        else{
            return back()->withErrors(['hora_inicio'=> trans('El horario minimo para ocupar una sala es de 30 minutos.'),
                                'hora_final'=> trans('El horario minimo para ocupar una sala es de 30 minutos.')]);
        }
    }
    else{
        return back()->withErrors(['hora_inicio'=> trans('Recuerda que la disponibilidad para usar la sala es de 7 Hrs a 21 Hrs.'),
                                'hora_final'=> trans('Recuerda que la disponibilidad para usar la sala es de 7 Hrs a 21 Hrs.')]); 
    }


        /* $evento = Event::findOrFail($id);;
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
        return Redirect::to('eventos'); */
     
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
        if(Auth::user()->id==$evento->usuario_id){
        $evento->activo = 0;
        $evento->update();
        return Redirect::to('eventos');
        }
        else{
            
        }

    }
    public function cancel($id){
        $evento = Event::findOrFail($id);
        if(Auth::user()->id==$evento->usuario_id){
        $evento->status_id = 4;
        $evento->update();
        return Redirect::to('eventos');
        }
        else{
            
        }
    }

    public function accept($id){
        $evento = Event::findOrFail($id);
        $evento->status_id = 3;
        $evento->update();
        return Redirect::to('eventos');
        
        }
        
    public function decline($id){
        $evento = Event::findOrFail($id);
        $evento->status_id = 7;
        $evento->update();
        return Redirect::to('eventos');
            
        }
}
