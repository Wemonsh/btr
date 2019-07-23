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
            Game::with(['categories'=>function($query){
                $query->with(['selects'=>function($query){
                    $query->with(['content'=>function($query){
                        $query->restore();
                    }])->restore();
                }])->restore();
            }])->onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/games');
    }
}
