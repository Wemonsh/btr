<?php

namespace App\Http\Controllers\Admin\Game;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(Request $request) {

        if (!empty($request['game_id']) && !empty($request['category_id']) && !empty($request['select_id'])) {
            echo 'Контент селекта';
        } elseif (!empty($request['game_id']) && !empty($request['category_id'])) {
            echo 'Селекты категории';
        } elseif (!empty($request['game_id'])) {
            echo 'Категории Игры';
        } else {
            $data = Game::paginate(10);

            $vars = [
                'data' => $data
            ];

            return view('admin.game.index', $vars);
        }
    }
}
