@extends('layouts.dashboard')

@section('content')
    <h1>Добавление нового ЧАВО для категории "{{ $category->name }}"</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?category_id='.$category_id.'&action=create' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="question">Вопрос</label>
            <input name="question" type="text" class="form-control" id="question" placeholder="Вопрос">
        </div>
        <div class="form-group">
            <label for="answer">Ответ</label>
            <textarea name="answer" class="form-control" id="answer" placeholder="Ответ" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input value="{{ $category->name }}" name="category" type="text" class="form-control" id="category" placeholder="Категория" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
