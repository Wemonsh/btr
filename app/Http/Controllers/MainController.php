<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class MainController extends Controller
{
    public function index() {

        $games = Game::with('gamingServices')->get()->toArray();

        //dump($games);

        $vars = [
            'games' => $games
        ];

        return view('welcome', $vars);
    }
}
