<?php

namespace App\Http\Controllers\Admin;

use App\ServiceCategory;
use App\ServiceCategoryContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectsController extends Controller
{
    public function index() {
        if (view()->exists('admin.selects.index')) {

            $vars = [
                'selects' => ServiceCategoryContent::with('gamingServices')->paginate(20)
            ];

            return view('admin.selects.index', $vars);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        if (view()->exists('admin.selects.create')) {
            if ($request->isMethod('post'))
            {
                ServiceCategoryContent::create([
                    'name' => $request->input('name'),
                    'category_id' => $request->input('category_id'),
                ]);

                return redirect('/admin/selects');
            } else {
                $vars = [
                    'categories' => ServiceCategory::all('name', 'id')
                ];
                return view('admin.selects.create', $vars);
            }
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('admin.selects.edit')) {
            if ($request->isMethod('post')) {

                $select = ServiceCategoryContent::where('id','=', $id)->first();
                $select->name = $request->input('name');
                $select->category_id = $request->input('category_id');
                $select->save();

                return redirect('/admin/selects');
            } else {
                $select = ServiceCategoryContent::where('id','=', $id)->first();
                if ($select != null) {
                    $vars = [
                        'select' => $select,
                        'id' => $id,
                        'categories' => ServiceCategory::all('name', 'id')
                    ];
                    return view('admin.selects.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('admin.selects.edit');
        } else {
            abort(404);
        }
    }

    public function delete() {
        echo __METHOD__;
    }
}
