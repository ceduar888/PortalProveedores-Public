<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $noticia = Noticias::first();

        return view('admin.panel', [
            'pagina' => 'Administración',
            'noticia' => $noticia
        ]);
    }
}
