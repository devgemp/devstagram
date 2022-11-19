<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => [
                'required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:25', 'not_in:facebook,editar-perfil'
            ],
        ]);

        if($request->imagen) {
            $img = $request->file('imagen');

            $nombre_imagen = Str::uuid() . "." . $img->extension();

            // Utilizamos intervation image para manipular nuestra imagen
            $img_server = Image::make($img);
            $img_server->fit(1000, 1000);

            // Moviendo imagen al servidor
            $img_path = public_path('perfiles') . '/' . $nombre_imagen;
            $img_server->save($img_path);
        }

        // Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombre_imagen ?? auth()->user()->imagen ?? null; // Nombre imagen o podemos dejarlo vacio
        $usuario->save();

        return to_route('posts.index', $usuario->username);
    }
}
