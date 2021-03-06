<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Category;
use App\ServiceCategory;
use App\ServiceCategoryContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index() {
        if (view()->exists('admin.services.index')) {

            $vars = [
                'services' => Category::with('game')->paginate(20)
            ];
            return view('admin.services.index', $vars);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        if (view()->exists('admin.services.create')) {
            if ($request->isMethod('post'))
            {
                Category::create([
                    'name' => $request->input('name'),
                    'alias' => $request->input('alias'),
                    'description' => $request->input('description'),
                    'game_id' => $request->input('game'),
                ]);

                return redirect('/admin/services');
            } else {
                $vars = [
                    'games' => Game::all('name', 'id')
                ];
                return view('admin.services.create', $vars);
            }
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('admin.services.edit')) {
            if ($request->isMethod('post')) {

                $service = Category::where('id','=', $id)->first();
                $service->name = $request->input('name');
                $service->alias = $request->input('alias');
                $service->description = $request->input('description');
                $service->game_id = $request->input('game');
                $service->save();

                return redirect('/admin/services');
            } else {
                $service = Category::where('id','=', $id)->first();
                if ($service != null) {
                    $vars = [
                        'service' => $service,
                        'id' => $id,
                        'games' => Game::all('name', 'id')
                    ];
                    return view('admin.services.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('admin.services.edit');
        } else {
            abort(404);
        }
    }

    public function delete($id) {
        if ($id != null) {
            Category::find($id)->delete();
        }

        return redirect('/admin/services');
    }

    public function recover($id) {
        if ($id != null) {
            Category::onlyTrashed()->find($id)->restore();
        }

        return redirect('/admin/services');
    }

    public function deleted() {
        if (view()->exists('admin.services.deleted')) {

            $vars = [
                'services' => Category::onlyTrashed()->paginate(20)
            ];
            return view('admin.services.deleted', $vars);
        } else {
            abort(404);
        }
    }

    public function show(Request $request, $id) {
        if (view()->exists('admin.services.show')) {

            $vars = [
                'service' => ServiceCategory::with('service')->where('id','=', $id)->first(),
                'id' => $id,
            ];
            dump(ServiceCategory::with('service')->where('id','=', $id)->first());
            return view('admin.services.show', $vars);
        } else {
            abort(404);
        }
    }
}
