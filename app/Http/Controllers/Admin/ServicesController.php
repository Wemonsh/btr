<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index() {
        if (view()->exists('admin.services.index')) {

            $vars = [
                'services' => Service::with('game')->paginate(20)
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
                Service::create([
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

                $service = Service::where('id','=', $id)->first();
                $service->name = $request->input('name');
                $service->alias = $request->input('alias');
                $service->description = $request->input('description');
                $service->game_id = $request->input('game');
                $service->save();

                return redirect('/admin/services');
            } else {
                $service = Service::where('id','=', $id)->first();
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

    public function delete() {
        echo __METHOD__;
    }
}
