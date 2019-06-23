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
        // Контент
        if (!empty($request['game_id']) && !empty($request['category_id']) && !empty($request['select_id'])) {
            if (!empty($request['action'])) {
                $this->create($request['game_id'], $request['category_id'], $request['select_id']);
            } else {
                $data = Select::with('content')->where('id', '=', $request['select_id'])->first();
                $vars = [
                    'select_id' => $request['select_id'],
                    'category_id' => $request['category_id'],
                    'game_id' => $request['game_id'],
                    'data' => $data
                ];
                return view('admin.game.content.index', $vars);
            }
        // Селекты
        } elseif (!empty($request['game_id']) && !empty($request['category_id'])) {
            if (!empty($request['action'])) {
                $this->create($request['game_id'], $request['category_id']);
            } else {
                $data = Category::with('selects')->where('id', '=', $request['category_id'])->first();
                $vars = [
                    'category_id' => $request['category_id'],
                    'game_id' => $request['game_id'],
                    'data' => $data
                ];
                return view('admin.game.select.index', $vars);
            }
        // Категории
        } elseif (!empty($request['game_id'])) {
            if (!empty($request['action'])) {
                $this->create($request['game_id']);
            } else {
                $data = Game::with('categories')->where('id', '=', $request['game_id'])->first();
                $vars = [
                    'game_id' => $request['game_id'],
                    'data' => $data
                ];
                return view('admin.game.category.index', $vars);
            }
        // Игры
        } else {
            if (!empty($request['action'])) {
                // Добавление
                if ($request['action'] == 'create') {
                    if ($request->isMethod('POST')) {

                        $card_image = null;
                        if ($request->file('card_image') != null) {
                            $card_image = $request->file('card_image')->store('/icons', 'public');
                        } else {
                            // Стандартная картинка
                        }

                        $full_image = null;
                        if ($request->file('full_image') != null) {
                            $full_image = $request->file('full_image')->store('/pages', 'public');
                        } else {
                            // Стандартная картинка
                        }

                        Game::create([
                            'name' => $request->input('name'),
                            'alias' => $request->input('alias'),
                            'card_image' => $card_image,
                            'full_image' => $full_image,
                            'background' => $request->input('background'),
                        ]);

                        return redirect('/admin/games/');
                    } else {
                        return view('admin.game.create');
                    }
                // Редактирование
                } elseif ($request['action'] == 'edit' && !empty($request['id'])) {
                    $data = Game::where('id','=', $request['id'])->first();
                    $vars = [
                        'data' => $data
                    ];
                    return view('admin.game.edit', $vars);
                // Удаление
                } elseif ($request['action'] == 'delete' && !empty($request['id'])) {
                    Game::find($request['id'])->delete();
                    return redirect()->back();
                }
            } else {
                $data = Game::paginate(15);
                $vars = [
                    'data' => $data
                ];
                return view('admin.game.index', $vars);
            }
        }
    }
}
