<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $games = Game::with('gamingServices')->get()->toArray();



        $user = Auth::user();
        $vars = [
          'user' => $user,
          'games' => $games
        ];

        //dump($games);


        return view('welcome', $vars);
    }

    public function game() {
        return view('games.wowfree');
    }

    public function gamew() {
        return view('games.wowrueng');
    }
}
