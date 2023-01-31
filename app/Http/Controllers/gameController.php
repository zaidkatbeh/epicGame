<?php

namespace App\Http\Controllers;
use App\Models\game;
use Illuminate\Http\Request;

class gameController extends Controller
{

    public function __constructor ()
    {
        $this->middleware('auth:api');
    }
    public function store(Request $Request)
    {
        $game=new game;
        $game->game_name=$Request['game_name'];
        $game->game_description=$Request['game_description'];
        $game->game_img=$Request['game_img'];
        $game->game_discount=$Request['game_discount'];
        $game->game_price=$Request['game_price'];
        $game->game_categore=$Request['game_categore'];
        $game->game_state=$Request['game_state'];
        $game->gameimage1=$Request['gameimage1'];
        $game->gameimage2=$Request['gameimage2'];
        $game->gameimage3=$Request['gameimage3'];
        $game->save();
        return response()->json([
            'result'=>'game added'
        ]);
    }
    public function index()
    {
        $games=game::get();
        return response()->json($games);
    }
    // public function show(Request $Request)
    // {
    //     dd($Request['id']);
    //     $game=game::where('id',$Request['id'])->get()->first();
    //     if($game==null)
    //     return response()->json([
    //         'states'=>0
    //     ]);
    //     return response()->json([
    //         'states'=>1,
    //         'game'=>$game
    //     ]);
    // }
}
