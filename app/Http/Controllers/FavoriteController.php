<?php

namespace App\Http\Controllers;

use App\Question;

class FavoriteController extends Controller
{
    public function __construct ()
    {
        $this->middleware( 'auth' );
    }

    public function store ( Question $question )
    {
        $question->favorites()->attach( auth()->user()->id );
        return back();
    }

    public function destroy ( Question $question )
    {
        $question->favorites()->detach( auth()->user()->id );
        return back();
    }
}
