<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqCategoriesController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.faq.categories.index')) {
            $vars = [
                'categories' => FaqCategory::onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.faq.categories.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            FaqCategory::onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/faq-categories');
    }
}
