<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NoticiasController extends Controller
{
    public function index()
    {
        $imagenes = Noticias::first();

        $rutas = [];

        return view('dashboard', [
            'pagina' => 'Inicio',
            'imagenes' => $imagenes
        ]);
    }

    public function noticia1(Request $request)
    {
        try{

            $rules = [
                'img1' => 'file|mimes:jpg,jpeg,png|max:6000'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect('/admin')->with('error', $validator->getMessageBag());
            }

            $rutaPublica = null;

            if (isset($request->img1) && $request->img1 instanceof \Illuminate\Http\UploadedFile) {
                $archivo = $request->img1;
                $nombre = time() . '_' . $archivo->getClientOriginalName();
                $ruta = $archivo->storeAs('public/anexos', $nombre);
                $rutaPublica = Storage::url($ruta);
            }
    
            $noticias = Noticias::first();

            if(!$noticias){
                Noticias::create([
                    'img1' => $rutaPublica
                ]);

                return redirect('/admin')->with('success', 'Banner actualizado con éxito');
            }

            $noticias->img1 = $rutaPublica;
            $noticias->save();

            return redirect('/admin')->with('success', 'Banner actualizado con éxito');
            
        }catch(\Exception $ex){
            return redirect('/admin')->with('error', $ex->getMessage());
        }
    }

    public function noticia2(Request $request)
    {
        try{

            $rules = [
                'img2' => 'file|mimes:jpg,jpeg,png|max:6000'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect('/admin')->with('error', $validator->getMessageBag());
            }

            $rutaPublica = null;

            if (isset($request->img2) && $request->img2 instanceof \Illuminate\Http\UploadedFile) {
                $archivo = $request->img2;
                $nombre = time() . '_' . $archivo->getClientOriginalName();
                $ruta = $archivo->storeAs('public/anexos', $nombre);
                $rutaPublica = Storage::url($ruta);
            }
    
            $noticias = Noticias::first();

            if(!$noticias){
                Noticias::create([
                    'img2' => $rutaPublica
                ]);

                return redirect('/admin')->with('success', 'Banner actualizado con éxito');
            }

            $noticias->img2 = $rutaPublica;
            $noticias->save();

            return redirect('/admin')->with('success', 'Banner actualizado con éxito');
            
        }catch(\Exception $ex){
            return redirect('/admin')->with('error', $ex->getMessage());
        }
    }

    public function noticia3(Request $request)
    {
        try{

            $rules = [
                'img3' => 'file|mimes:jpg,jpeg,png|max:6000'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect('/admin')->with('error', $validator->getMessageBag());
            }

            $rutaPublica = null;

            if (isset($request->img3) && $request->img3 instanceof \Illuminate\Http\UploadedFile) {
                $archivo = $request->img3;
                $nombre = time() . '_' . $archivo->getClientOriginalName();
                $ruta = $archivo->storeAs('public/anexos', $nombre);
                $rutaPublica = Storage::url($ruta);
            }
    
            $noticias = Noticias::first();

            if(!$noticias){
                Noticias::create([
                    'img3' => $rutaPublica
                ]);

                return redirect('/admin')->with('success', 'Banner actualizado con éxito');
            }

            $noticias->img3 = $rutaPublica;
            $noticias->save();

            return redirect('/admin')->with('success', 'Banner actualizado con éxito');
            
        }catch(\Exception $ex){
            return redirect('/admin')->with('error', $ex->getMessage());
        }
    }

    public function noticia4(Request $request)
    {
        try{

            $rules = [
                'img4' => 'file|mimes:jpg,jpeg,png|max:6000'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect('/admin')->with('error', $validator->getMessageBag());
            }

            $rutaPublica = null;

            if (isset($request->img4) && $request->img4 instanceof \Illuminate\Http\UploadedFile) {
                $archivo = $request->img4;
                $nombre = time() . '_' . $archivo->getClientOriginalName();
                $ruta = $archivo->storeAs('public/anexos', $nombre);
                $rutaPublica = Storage::url($ruta);
            }
    
            $noticias = Noticias::first();

            if(!$noticias){
                Noticias::create([
                    'img4' => $rutaPublica
                ]);

                return redirect('/admin')->with('success', 'Banner actualizado con éxito');
            }

            $noticias->img4 = $rutaPublica;
            $noticias->save();

            return redirect('/admin')->with('success', 'Banner actualizado con éxito');
            
        }catch(\Exception $ex){
            return redirect('/admin')->with('error', $ex->getMessage());
        }
    }
}
