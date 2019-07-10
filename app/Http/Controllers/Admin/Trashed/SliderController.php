<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.slider.index')) {
            $vars = [
                'slider' => Slider::onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.slider.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            Slider::onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/slider');
    }
}
