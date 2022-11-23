<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        /**
         * attach nos da el funcionamiento adecuado
         * cuando tenemos que relacionar datos de la
         * misma tabla y el mismo campo.
         */
        $user->followers()->attach(auth()->user()->id);

        return back();
    }

    public function destroy(User $user)
    {
        $user->followers()->detach(auth()->user()->id);

        return back();
    }
}
