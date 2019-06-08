<?php

namespace App\Http\Controllers\Admin;

use App\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index() {
        if (view()->exists('admin.categories.index')) {

            $vars = [
                'categories' => ServiceCategory::paginate(20)
            ];
            return view('admin.categories.index', $vars);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        if (view()->exists('admin.categories.create')) {
            if ($request->isMethod('post'))
            {
                ServiceCategory::create([
                    'name' => $request->input('name'),
                    'placeholder' => $request->input('placeholder'),
                ]);

                return redirect('/admin/categories');
            } else {
                return view('admin.categories.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('admin.categories.edit')) {
            if ($request->isMethod('post')) {

                $service_category = ServiceCategory::where('id','=', $id)->first();
                $service_category->name = $request->input('name');
                $service_category->placeholder = $request->input('placeholder');
                $service_category->save();

                return redirect('/admin/categories');
            } else {
                $service_category = ServiceCategory::where('id','=', $id)->first();
                if ($service_category != null) {
                    $vars = [
                        'service_category' => $service_category,
                        'id' => $id,
                    ];
                    return view('admin.categories.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('admin.categories.edit');
        } else {
            abort(404);
        }
    }

    public function delete() {
        echo __METHOD__;
    }
}
