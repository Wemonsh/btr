@extends('layouts.dashboard')

@section('content')
    <h1>Редактирование Чаво "id:{{ $data->id }}" для категории "{{ $category->name }}"</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?category_id='.$category_id.'&id='.$data->id.'&action=edit' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="question">Вопрос</label>
            <input name="question" type="text" class="form-control" id="question" placeholder="Вопрос" value="{{ $data->question }}">
        </div>
        <div class="form-group">
            <label for="answer">Ответ</label>
            <input name="answer" type="text" class="form-control" id="answer" placeholder="Ответ" value="{{ $data->answer }}">
        </div>
        <div class="form-group">
            <input value="{{ $category->name }}" name="category" type="text" class="form-control" id="category" placeholder="Категория" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection