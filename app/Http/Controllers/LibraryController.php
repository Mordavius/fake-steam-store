<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Auth;
use App\Library;

class LibraryController extends Controller
{
    // this is a users library, not public info bro
    public function __construct() {
        $this->middleware('auth');
    }

    // get me some games, my games only
    public function index()
    {
        $games = Auth::user()->games();
        return view('library.index', compact('games'));
    }

    // add a game to the library
    public function add(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::user()->getId();
            $library = new Library;
            $library->game_id = $request->id;
            $library->user_id = $id;
            $library->save();
            return redirect()->back()->with('succes', 'Game added to library');
        } else {
            return redirect()->back()->with('error', 'You need to be logged in bro');
        }
    }
}