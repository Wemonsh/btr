<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\WebsocketEvent;
use App\Select;
use App\Slider;
use Illuminate\Http\Request;
use App\Game;

class MainController extends Controller
{
    public static function index() {
        $games = Game::with('categories')->get()->toArray();

        $vars = [
            'games' => $games,
            'slider' => Slider::inRandomOrder()->take(3)->get()->toArray(),
            'counter' => 0,
        ];
        return view('welcome', $vars);
    }
}
