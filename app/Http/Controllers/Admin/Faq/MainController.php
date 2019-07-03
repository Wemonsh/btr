<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Faq;
use App\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(Request $request) {
        // ЧАВО
        if (!empty($request['category_id'])) {
            if (!empty($request['action'])) {
                // Добавление
                if ($request['action'] == 'create' && !empty($request['category_id'])) {
                    return $this->faqAdd($request);
                // Редактирование
                } elseif ($request['action'] == 'edit' && !empty($request['category_id'])) {
                    return $this->faqEdit($request);
                // Удаление
                } elseif ($request['action'] == 'delete' && !empty($request['category_id'])) {
                    return $this->faqDelete($request);
                }
                // Отображение
            } else {
                return $this->faqShow($request);
            }
            // Категории ЧАВО
        } else {
            if (!empty($request['action'])) {
                // Добавление
                if ($request['action'] == 'create') {
                    return $this->faqCategoryAdd($request);
                // Редактирование
                } elseif ($request['action'] == 'edit' && !empty($request['id'])) {
                    return $this->faqCategoryEdit($request);
                // Удаление
                } elseif ($request['action'] == 'delete' && !empty($request['id'])) {
                    return $this->faqCategoryDelete($request);
                }
                // Отображение
            } else {
                return $this->faqCategoryShow();
            }
        }
    }

    // Faq Category Methods
    private static function faqCategoryShow() {
        $data = FaqCategory::all();
        $vars = [
            'data' => $data
        ];
        return view('admin.faq.category.index', $vars);
    }

    private static function faqCategoryAdd($request) {
        if ($request->isMethod('POST')) {
            FaqCategory::create([
                'name' => $request->input('name'),
            ]);
            return redirect('/admin/faq/');
        } else {
            return view('admin.faq.category.create');
        }
    }

    private static function faqCategoryEdit($request) {
        if ($request->isMethod('POST')) {
            $data = FaqCategory::where('id','=', $request['id'])->first();
            $data->name = $request->input('name');
            $data->save();
            return redirect('/admin/faq/');
        } else {
            $data = FaqCategory::where('id','=', $request['id'])->first();
            $vars = [
                'data' => $data
            ];
            return view('admin.faq.category.edit', $vars);
        }
    }

    private static function faqCategoryDelete($request) {
        FaqCategory::find($request['id'])->delete();
        return redirect('/admin/faq/');
    }



    // Faq Methods
    private static function faqShow($request) {
        $data = Faq::with('faqCategory')->where('id_category', '=', $request['category_id'])->get();
        $vars = [
            'category_id' => $request['category_id'],
            'category' => FaqCategory::where('id', '=', $request['category_id'])->first(),
            'data' => $data
        ];
        return view('admin.faq.index', $vars);
    }

    private static function faqAdd($request) {
        if ($request->isMethod('POST')) {
            Faq::create([
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
                'id_category' => $request['category_id'],
            ]);
            return redirect('/admin/faq/?category_id='.$request['category_id']);
        } else {
            $data = Faq::where('id_category','=', $request['category_id'])->first();
            $vars = [
                'data' => $data,
                'category_id' => $request['category_id'],
                'category' => FaqCategory::where('id', '=', $request['category_id'])->first(),
            ];
            return view('admin.faq.create', $vars);
        }
    }

    private static function faqEdit($request) {
        if ($request->isMethod('POST')) {
            $data = Faq::with('faqCategory')->where('id','=', $request['id'])->first();
            $data->question = $request->input('question');
            $data->answer = $request->input('answer');
            $data->id_category = $request['category_id'];
            $data->save();
            return redirect('/admin/faq/?category_id='.$request['category_id']);
        } else {
            $data = Faq::with('faqCategory')->where('id','=', $request['id'])->first();
            $vars = [
                'data' => $data,
                'id' => $request['id'],
                'category_id' => $request['category_id'],
                'category' => FaqCategory::where('id', '=', $request['category_id'])->first(),
            ];
            return view('admin.faq.edit', $vars);
        }
    }

    private static function faqDelete($request) {
        Faq::find($request['id'])->delete();
        return redirect('/admin/faq/?category_id='.$request['category_id']);
    }
}