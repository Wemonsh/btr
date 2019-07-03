<?php

namespace App\Http\Controllers\Admin\Game;

use App\Category;
use App\Content;
use App\Game;
use App\Select;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request) {
        // Контент
        if (!empty($request['game_id']) && !empty($request['category_id']) && !empty($request['select_id'])) {
            if (!empty($request['action'])) {
                // Добавление
                if ($request['action'] == 'create' && !empty($request['game_id']) && !empty($request['category_id']) && !empty($request['select_id'])) {
                    return $this->contentAdd($request);
                // Редактирование
                } elseif ($request['action'] == 'edit' && !empty($request['game_id']) && !empty($request['category_id']) && !empty($request['select_id'])) {
                    return $this->contentEdit($request);
                // Удаление
                } elseif ($request['action'] == 'delete' && !empty($request['game_id']) && !empty($request['category_id']) && !empty($request['select_id'])) {
                    return $this->contentDelete($request);
                }
                // Отображение
            } else {
                return $this->contentShow($request);
            }
        // Селекты
        } elseif (!empty($request['game_id']) && !empty($request['category_id'])) {
            if (!empty($request['action'])) {
                // Добавление
                if ($request['action'] == 'create' && !empty($request['game_id']) && !empty($request['category_id'])) {
                    return $this->selectAdd($request);
                // Редактирование
                } elseif ($request['action'] == 'edit' && !empty($request['game_id']) && !empty($request['category_id'])) {
                    return $this->selectEdit($request);
                // Удаление
                } elseif ($request['action'] == 'delete' && !empty($request['game_id']) && !empty($request['category_id'])) {
                    return $this->selectDelete($request);
                }
                // Отображение
            } else {
                return $this->selectShow($request);
            }
        // Категории
        } elseif (!empty($request['game_id'])) {
            if (!empty($request['action'])) {
                // Добавление
                if ($request['action'] == 'create' && !empty($request['game_id'])) {
                    return $this->categoryAdd($request);
                // Редактирование
                } elseif ($request['action'] == 'edit' && !empty($request['game_id'])) {
                    return $this->categoryEdit($request);
                // Удаление
                } elseif ($request['action'] == 'delete' && !empty($request['game_id'])) {
                    return $this->categoryDelete($request);
                }
                // Отображение
            } else {
                return $this->categoryShow($request);
            }
        // Игры
        } else {
            if (!empty($request['action'])) {
                // Добавление
                if ($request['action'] == 'create') {
                    return $this->gameAdd($request);
                // Редактирование
                } elseif ($request['action'] == 'edit' && !empty($request['id'])) {
                    return $this->gameEdit($request);
                // Удаление
                } elseif ($request['action'] == 'delete' && !empty($request['id'])) {
                    return $this->gameDelete($request);
                }
                // Отображение
            } else {
                return $this->gameShow();
            }
        }
    }

    // Games Methods
    private static function gameShow() {
        $data = Game::paginate(15);
        $vars = [
            'data' => $data
        ];
        return view('admin.game.index', $vars);
    }

    private static function gameAdd($request) {
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
    }

    private static function gameEdit($request) {
        if ($request->isMethod('POST')) {
            $data = Game::where('id','=', $request['id'])->first();
            $data->name = $request->input('name');
            $data->alias = $request->input('alias');
            if ($request->file('card_image') != null) {
                $card_image = $request->file('card_image')->store('/icons', 'public');
                $data->card_image = $card_image;
            }
            if ($request->file('full_image') != null) {
                $full_image = $request->file('full_image')->store('/pages', 'public');
                $data->full_image = $full_image;
            }
            $data->background = $request->input('background');
            $data->save();
            return redirect('/admin/games/');
        } else {
            $data = Game::where('id','=', $request['id'])->first();
            $vars = [
                'data' => $data
            ];
            return view('admin.game.edit', $vars);
        }
    }

    private static function gameDelete($request) {
        Game::find($request['id'])->delete();
        return redirect('/admin/games/');
    }

    // Category Methods
    private static function categoryShow($request) {
        $data = Game::with('categories')->where('id', '=', $request['game_id'])->first();
        $vars = [
            'game_id' => $request['game_id'],
            'data' => $data
        ];
        return view('admin.game.category.index', $vars);
    }

    private static function categoryAdd($request) {
        if ($request->isMethod('POST')) {
            Category::create([
                'name' => $request->input('name'),
                'alias' => $request->input('alias'),
                'description' => $request->input('description'),
                'game_id' => $request['game_id'],
            ]);
            return redirect('/admin/games/?game_id='.$request['game_id']);
        } else {
            $data = Game::where('id','=', $request['game_id'])->first();
            $vars = [
                'data' => $data,
                'game_id' => $request['game_id']
            ];
            return view('admin.game.category.create', $vars);
        }
    }

    private static function categoryEdit($request) {
        if ($request->isMethod('POST')) {
            $data = Category::with('game')->where('id','=', $request['id'])->first();
            $data->name = $request->input('name');
            $data->alias = $request->input('alias');
            $data->description = $request->input('description');
            $data->game_id = $request['game_id'];
            $data->save();
            return redirect('/admin/games/?game_id='.$request['game_id']);
        } else {
            $data = Category::with('game')->where('id','=', $request['id'])->first();
            $vars = [
                'data' => $data,
                'id' => $request['id'],
                'game_id' => $request['game_id']
            ];
            return view('admin.game.category.edit', $vars);
        }
    }

    private static function categoryDelete($request) {
        Category::find($request['id'])->delete();
        return redirect('/admin/games/?game_id='.$request['game_id']);
    }

    // Select Methods
    private static function selectShow($request) {
        $data = Category::with('selects')->where('id', '=', $request['category_id'])->first();
        $vars = [
            'category_id' => $request['category_id'],
            'game_id' => $request['game_id'],
            'data' => $data
        ];
        return view('admin.game.select.index', $vars);
    }

    private static function selectAdd($request) {
        if ($request->isMethod('POST')) {
            $category = Category::where('id','=', $request['category_id'])->first();
            $select = Select::create([
                'name' => $request->input('name'),
                'placeholder' => $request->input('placeholder'),
            ]);
            Db::table('category_select')->insert([
                'category_id' => $category->id,
                'select_id' => $select->id,
            ]);
            return redirect('/admin/games/?game_id='.$request['game_id'].'&category_id='.$request['category_id']);
        } else {
            $data = Game::where('id','=', $request['game_id'])->first();
            $category = Category::where('id','=', $request['category_id'])->first();
            $vars = [
                'data' => $data,
                'category_id' => $request['category_id'],
                'category' => $category,
                'game_id' => $request['game_id']
            ];
            return view('admin.game.select.create', $vars);
        }
    }

    private static function selectEdit($request) {
        if ($request->isMethod('POST')) {
            $select = Select::where('id','=', $request['id'])->first();
            $select->name = $request->input('name');
            $select->placeholder = $request->input('placeholder');
            $select->save();
            return redirect('/admin/games/?game_id='.$request['game_id'].'&category_id='.$request['category_id']);
        } else {
            $data = Select::where('id','=', $request['id'])->first();
            $game = Game::where('id','=', $request['game_id'])->first();
            $category = Category::where('id','=', $request['category_id'])->first();
            $vars = [
                'data' => $data,
                'game' => $game,
                'category' => $category,
                'id' => $request['id'],
                'game_id' => $request['game_id'],
                'category_id' => $request['category_id']
            ];
            return view('admin.game.select.edit', $vars);
        }
    }

    private static function selectDelete($request) {
        Select::find($request['id'])->delete();
        return redirect('/admin/games/?game_id='.$request['game_id'].'&category_id='.$request['category_id']);
    }

    // Content Methods
    private static function contentShow($request) {
        $select = Select::with('content')->where('id', '=', $request['select_id'])->first();
        $game = Game::where('id','=', $request['game_id'])->first();
        $category = Category::where('id','=', $request['category_id'])->first();
        $vars = [
            'select_id' => $request['select_id'],
            'category_id' => $request['category_id'],
            'game_id' => $request['game_id'],
            'select' => $select,
            'game' => $game,
            'category' => $category,
        ];
        return view('admin.game.content.index', $vars);
    }

    private static function contentAdd($request) {
        if ($request->isMethod('POST')) {
            Content::create([
                'name' => $request->input('name'),
                'select_id' => $request['select_id'],
            ]);
            return redirect('/admin/games/?game_id='.$request['game_id'].'&category_id='.$request['category_id'].'&select_id='.$request['select_id']);
        } else {
            $select = Select::with('content')->where('id', '=', $request['select_id'])->first();
            $game = Game::where('id','=', $request['game_id'])->first();
            $category = Category::where('id','=', $request['category_id'])->first();
            $vars = [
                'select_id' => $request['select_id'],
                'category_id' => $request['category_id'],
                'game_id' => $request['game_id'],
                'select' => $select,
                'game' => $game,
                'category' => $category,
            ];
            return view('admin.game.content.create', $vars);
        }
    }

    private static function contentEdit($request) {
        if ($request->isMethod('POST')) {
            $select = Content::where('id','=', $request['id'])->first();
            $select->name = $request->input('name');
            $select->select_id = $request['select_id'];
            $select->save();
            return redirect('/admin/games/?game_id='.$request['game_id'].'&category_id='.$request['category_id'].'&select_id='.$request['select_id']);
        } else {
            $content = Content::where('id','=', $request['id'])->first();
            $select = Select::with('content')->where('id', '=', $request['select_id'])->first();
            $game = Game::where('id','=', $request['game_id'])->first();
            $category = Category::where('id','=', $request['category_id'])->first();
            $vars = [
                'select_id' => $request['select_id'],
                'category_id' => $request['category_id'],
                'game_id' => $request['game_id'],
                'select' => $select,
                'game' => $game,
                'category' => $category,
                'content' => $content,
            ];
            return view('admin.game.content.edit', $vars);
        }
    }

    private static function contentDelete($request) {
        Content::find($request['id'])->delete();
        return redirect('/admin/games/?game_id='.$request['game_id'].'&category_id='.$request['category_id'].'&select_id='.$request['select_id']);
    }
}
