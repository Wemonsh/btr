<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\Select;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesSelectsController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.games.selects.index')) {
            $vars = [
                'selects' => Select::with('categories', 'content')->onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.games.selects.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            Select::with(['content'=>function($query){
                $query->restore();
            }])->onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/games-selects');
    }
}
