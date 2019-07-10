<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
        if (view()->exists('admin.slider.index')) {
            $vars = [
                'data' => Slider::paginate(20),
            ];
            return view('admin.slider.index', $vars);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        if (view()->exists('admin.slider.create')) {
            if ($request->isMethod('post'))
            {
                $image = null;
                if ($request->file('image') != null) {
                    $image = $request->file('image')->store('/slider', 'public');
                } else {
                    // Стандартная картинка
                }
                Slider::create([
                    'image' => $image,
                    'headline' => $request->input('headline'),
                    'description' => $request->input('description'),
                    'button_text' => $request->input('button_text'),
                    'link' => $request->input('link'),
                    'button_exists' => $request->input('button_exists') == null ? 0 : 1,
                ]);
                return redirect('/admin/slider');
            } else {
                return view('admin.slider.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('admin.slider.edit')) {
            if ($request->isMethod('post')) {
                $slider = Slider::where('id','=', $id)->first();
                if ($request->file('image') != null) {
                    $image = $request->file('image')->store('/slider', 'public');
                    $slider->image = $image;
                }
                $slider->headline = $request->input('headline');
                $slider->description = $request->input('description');
                $slider->button_text = $request->input('button_text');
                $slider->link = $request->input('link');
                $slider->button_exists = $request->input('button_exists') == null ? 0 : 1;
                $slider->save();
                return redirect('/admin/slider');
            } else {
                $slider = Slider::where('id','=', $id)->first();
                if ($slider != null) {
                    $vars = [
                        'slider' => $slider,
                        'id' => $id,
                    ];
                    return view('admin.slider.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('admin.slider.edit');
        } else {
            abort(404);
        }
    }

    public function delete($id) {
        if ($id != null) {
            Slider::find($id)->delete();
        }
        return redirect('/admin/slider');
    }
}
