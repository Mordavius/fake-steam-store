<?php

namespace App\Http\Controllers;
use App\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests\GameRequest;
class GamesController extends Controller
{
    public function index(){
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function searchbystring(Request $data){
        //$games = Game::where('name', 'LIKE', '%'. $data->char .'%');
        if (!$data->char){
            return response()->json("no result found");
        }
        else {
            $games = DB::table('games')
                ->where('name', 'like', '%' . $data->char . '%')
                ->get();
            return response()->json(array('msg' => $games), 200);
        }
    }

    public function new(){
        return view('games.new');
    }

    public function search(){
        return view('games.search');
    }

    public function create(GameRequest $request){
        $game = new Game();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->highlighted = $request->highlighted;
        $game->price = $request->price;
        $game->available = $request->available;
        $game->save();

        return redirect('/games');
    }
}
