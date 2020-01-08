<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $datos = Gallery::where('activo','=','1')->where('evento_id','=',$id)->get();
        return view('content.gallery.index',['datos'=>$datos,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("content.gallery.create",['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $credentials=$this->validate(request(),[
            'file' => 'required|mimes:jpg,jpeg,png|max:10000',
        ]);
        $path = Storage::disk('public')->put('imgupload/eventos', $request->file('file'));
        $imagen=asset($path);
        
        $gallery = new Gallery;
        $gallery->evento_id = $id;
        $gallery->url = $imagen;
        $gallery->activo = 1;
        $gallery->save();
        return Redirect::to('eventos/gallery/'.$id.'');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos= Gallery::where('usuario_id');
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
        $image=Gallery::find($id);
        $image->activo = 0;
        $image->update();
        $evento_id = $image->evento_id;
        return Redirect::to('eventos/gallery/'.$evento_id.'');
    
    }

}