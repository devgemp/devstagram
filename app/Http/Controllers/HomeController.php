<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Si nuestro controlador solo va a tener un metodo
     * podemos hacer uso del método invoke
     */
    public function __invoke()
    {
        /** Obtener usuarios que seguimos */
        $ids = ( auth()->user()->followings->pluck('id')->toArray() );
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
