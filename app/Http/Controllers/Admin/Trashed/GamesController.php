<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.games.index')) {
            $vars = [
                'games' => Game::onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.games.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            Game::onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/games');
    }
}
