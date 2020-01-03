<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Token;

class RegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //registrar en base de datos
        $credentials=$this->validate(request(),[
            'apellido_paterno' => 'required|string',
            'apellido_materno'=>'required',
            'edad'=>'required|integer',
            'nombre'=>'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefono'=>'required|string|max:10',
            'token'=>'required|string|max:6',
        ]);


        $token = $request->get('token');
        $db_token = Token::where('token','=',$token)->where('activo','=',1)->first();

        if($db_token!=null){
            $db_token->activo=0;
            $db_token->update();
            $usuario = new User;
            $usuario->name = $request->get('nombre');
            $usuario->email = $request->get('email');
            $usuario->password = bcrypt($request->get('password'));
            $usuario->activo = 1;
            $usuario->rol = "general";
            $usuario->remember_token = $token;
            $usuario->apellido_paterno = $request->get('apellido_paterno');
            $usuario->apellido_materno = $request->get('apellido_materno');
            $usuario->edad = $request->get('edad');
            $usuario->telefono = $request->get('telefono');
            $usuario->save();
            return Redirect::to('login');
        }
        else{
            return back()->withErrors(['token'=> trans('El token no es valido.')]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
