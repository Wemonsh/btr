<?php

namespace App\Http\Controllers\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index() {

        return view('faq.index');
    }
}
