<?php

namespace App\Http\Controllers;

use App\Category;
use App\Select;
use Illuminate\Http\Request;
use App\Game;

class MainController extends Controller
{
    public function index() {

        $games = Game::with('categories')->get()->toArray();

        $vars = [
            'games' => $games
        ];

        return view('welcome', $vars);
    }
}
