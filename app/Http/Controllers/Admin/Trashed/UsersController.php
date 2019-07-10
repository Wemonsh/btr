<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.users.index')) {
            $vars = [
                'users' => User::with('roles')->onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.users.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            User::onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/users');
    }
}
