<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.roles.index')) {
            $vars = [
                'roles' => Role::onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.roles.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            Role::onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/roles');
    }
}
