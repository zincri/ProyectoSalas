<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    //use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->rol!="admin"){
            return Redirect::to('/');
        }
        else{
            $datos = User::where('activo', '=', '1')->get();
            return view("content.usuarios.index",['datos'=>$datos]);
        }
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("content.usuarios.create");
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
            'edad'=>'required',
            'rol'=>'required',
            'nombre'=>'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefono'=>'required|string|max:10',
        ]);

        $usuario = new User;
        $usuario->name = $request->get('nombre');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        $usuario->activo = 1;
        $usuario->rol = $request->get('rol');
        $usuario->apellido_paterno = $request->get('apellido_paterno');
        $usuario->apellido_materno = $request->get('apellido_materno');
        $usuario->edad = $request->get('edad');
        $usuario->telefono = $request->get('telefono');
        $usuario->save();
        return Redirect::to('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return back();
        //return view("content.usuarios.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->rol=="admin"){
            $datos = User::find($id);
            return view("content.usuarios.edit",['datos'=>$datos]);
        }
        else{
            if(Auth::user()->id==$id){
                $datos = User::find($id);
                return view("content.usuarios.edit",['datos'=>$datos]);
            }
            else{
                return back();
            }

        }
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
        //Aqui actualizamos todo
        if(Auth::user()->rol=="admin"){
        $credentials=$this->validate(request(),[
            'apellido_paterno' => 'required|string',
            'apellido_materno'=>'required',
            'edad'=>'required',
            'rol'=>'required',
            'nombre'=>'required|string|max:50',
            'email' => 'required|string|email|max:50',
            'telefono'=>'required|string|max:10',
        ]);

        $usuario = User::findOrFail($id);
        $usuario->name = $request->get('nombre');
        $usuario->email = $request->get('email');
        $usuario->activo = 1;
        $usuario->rol = $request->get('rol');
        $usuario->apellido_paterno = $request->get('apellido_paterno');
        $usuario->apellido_materno = $request->get('apellido_materno');
        $usuario->edad = $request->get('edad');
        $usuario->telefono = $request->get('telefono');
        $usuario->update();

        return Redirect::to('usuarios');
        }
        else{
            if(Auth::user()->id==$id){
                $credentials=$this->validate(request(),[
                    'apellido_paterno' => 'required|string',
                    'apellido_materno'=>'required',
                    'edad'=>'required',
                    //'rol'=>'required',
                    'nombre'=>'required|string|max:50',
                    'email' => 'required|string|email|max:50',
                    'telefono'=>'required|string|max:10',
                ]);
        
                $usuario = User::findOrFail($id);
                $usuario->name = $request->get('nombre');
                $usuario->email = $request->get('email');
                $usuario->activo = 1;
                //$usuario->rol = $request->get('rol');
                $usuario->apellido_paterno = $request->get('apellido_paterno');
                $usuario->apellido_materno = $request->get('apellido_materno');
                $usuario->edad = $request->get('edad');
                $usuario->telefono = $request->get('telefono');
                $usuario->update();
        
                return Redirect::to('usuarios');
            }
            else{
                return back();
            }
            

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar Datos

        $usuario = User::findOrFail($id);
        $usuario->activo = 0;
        $usuario->update();
        return Redirect::to('usuarios');
    }

    public function resetpass()
    {
        return view("content.usuarios.resetear_pass");
    }
    public function saveresetpass(Request $request)
    {
        $credentials=$this->validate(request(),[
            'password' => 'required|string|min:6|confirmed',
            'passwordold' => 'required|string|min:6',
        ]);
        $new = $request->get('password');
        $old = $request->get('passwordold');
        $usuario = Auth::user();
        if(Hash::check($old, $usuario->password)){
            $usuario_db = User::findOrFail($usuario->id);
            $usuario_db->password = bcrypt($new);
            $usuario_db->update();
            return Redirect::to('/');

        }
        else{
            return back()->withErrors(['passwordold'=> trans('La contraseña no es correcta, debe ingresar la contraseña actual antes de cambiarla.')]);
        }
        
    }

    public function resetpassuser($id)
    {
        if(Auth::user()->rol=="admin"){
            return view("content.usuarios.resetear_pass_user",['id'=>$id]);
        }
        else{
            return back();
        }
        
    }

    public function saveresetpassuser(Request $request,$id)
    {
        if(Auth::user()->rol=="admin"){
            $credentials=$this->validate(request(),[
                'password' => 'required|string|min:6|confirmed',
            ]);
            $new = $request->get('password');
            $usuario_db = User::findOrFail($id);
            $usuario_db->password = bcrypt($new);
            $usuario_db->update();
            return Redirect::to('usuarios');
        }
        else{
            return back();
        }
    }

}
