<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.faq.index')) {
            $vars = [
                'faqs' => Faq::with('faqCategory')->onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.faq.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            Faq::onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/faq');
    }
}
