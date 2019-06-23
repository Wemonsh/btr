<?php

namespace App\Http\Controllers\Admin\Game;

use App\Category;
use App\Game;
use App\Select;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(Request $request) {

        if (!empty($request['game_id']) && !empty($request['category_id']) && !empty($request['select_id'])) {
            $data = Select::with('content')->where('id','=', $request['select_id'])->first();
            $vars = [
                'category_id' => $request['category_id'],
                'game_id' => $request['game_id'],
                'data' => $data
            ];
            return view('admin.game.content.index', $vars);

        } elseif (!empty($request['game_id']) && !empty($request['category_id'])) {
            $data = Category::with('selects')->where('id', '=', $request['category_id'])->first();
            $vars = [
                'category_id' => $request['category_id'],
                'game_id' => $request['game_id'],
                'data' => $data
            ];
            return view('admin.game.select.index', $vars);

        } elseif (!empty($request['game_id'])) {
            $data = Game::with('categories')->where('id', '=', $request['game_id'])->first();
            $vars = [
                'game_id' => $request['game_id'],
                'data' => $data
            ];
            return view('admin.game.category.index', $vars);

        } else {
            $data = Game::paginate(10);
            $vars = [
                'data' => $data
            ];
            return view('admin.game.index', $vars);
        }
    }
}
