<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $img = $request->file('file');

        $nombre_imagen = Str::uuid() . "." . $img->extension();

        // Utilizamos intervation image para manipular nuestra imagen
        $img_server = Image::make($img);
        $img_server->fit(1000, 1000);

        // Moviendo imagen al servidor
        $img_path = public_path('uploads') . '/' . $nombre_imagen;
        $img_server->save($img_path);

        return response()->json(['imagen' => $nombre_imagen]);
    }
}
