<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
        if (view()->exists('admin.roles.index')) {
            $vars = [
                'data' => Role::paginate(20),
            ];
            return view('admin.roles.index', $vars);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        if (view()->exists('admin.roles.create')) {
            if ($request->isMethod('post'))
            {
                Role::create([
                    'name' => $request->input('name'),
                ]);
                return redirect('/admin/roles');
            } else {
                return view('admin.roles.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('admin.roles.edit')) {
            if ($request->isMethod('post')) {
                $role = Role::where('id','=', $id)->first();
                $role->name = $request->input('name');
                $role->save();
                return redirect('/admin/roles');
            } else {
                $role = Role::where('id','=', $id)->first();
                if ($role != null) {
                    $vars = [
                        'role' => $role,
                        'id' => $id,
                    ];
                    return view('admin.roles.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('admin.roles.edit');
        } else {
            abort(404);
        }
    }

    public function delete($id) {
        if ($id != null) {
            Role::find($id)->delete();
        }
        return redirect('/admin/roles');
    }
}
