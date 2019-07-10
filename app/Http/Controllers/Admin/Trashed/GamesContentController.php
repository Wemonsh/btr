<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesContentController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.games.content.index')) {
            $vars = [
                'content' => Content::with('selectTrashed')->onlyTrashed()->paginate(20)
            ];
            dump($vars);
            return view('admin.trashed.games.content.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            Content::onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/games-content');
    }
}
