<?php

namespace App\Http\Controllers\Faq;

use App\Faq;
use App\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index() {
        if (view()->exists('faq.index')) {
            $vars = [
                'faq_categories' => FaqCategory::with('faqs')->get()->toArray(),
            ];
            return view('faq.index', $vars);
        } else {
            abort(404);
        }
    }
}
