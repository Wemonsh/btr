<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    public function index() {
        if (view()->exists('admin.games.index')) {

            $vars = [
                'games' => Game::paginate(20)
            ];
            return view('admin.games.index', $vars);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        if (view()->exists('admin.games.create')) {
            if ($request->isMethod('post'))
            {
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

                return redirect('/admin/games');
            } else {
                return view('admin.games.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('admin.games.edit')) {
            if ($request->isMethod('post')) {

                $game = Game::where('id','=', $id)->first();

                $game->name = $request->input('name');
                $game->alias = $request->input('alias');

                if ($request->file('card_image') != null) {
                    $card_image = $request->file('card_image')->store('/icons', 'public');
                    $game->card_image = $card_image;
                }

                if ($request->file('full_image') != null) {
                    $full_image = $request->file('full_image')->store('/pages', 'public');
                    $game->full_image = $full_image;
                }

                $game->background = $request->input('background');

                $game->save();

                return redirect('/admin/games');
            } else {
                $game = Game::where('id','=', $id)->first();
                if ($game != null) {
                    $vars = [
                        'game' => $game,
                        'id' => $id,
                    ];
                    return view('admin.games.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('admin.games.edit');
        } else {
            abort(404);
        }
    }

    public function delete() {
        echo __METHOD__;
    }

    public function show(Request $request, $id) {
        if (view()->exists('admin.games.show')) {

            $vars = [
                'game' => Game::with('gamingServices')->where('id','=', $id)->first(),
                'id' => $id,
            ];

            return view('admin.games.show', $vars);
        } else {
            abort(404);
        }
    }
}
