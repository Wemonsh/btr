<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\Category;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesCategoriesController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.games.categories.index')) {
            $vars = [
                'categories' => Category::with('game')->onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.games.categories.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            Category::with(['selects'=>function($query){
                $query->with(['content'=>function($query){
                    $query->restore();
                }])->restore();
            }])->onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/games-categories');
    }
}
