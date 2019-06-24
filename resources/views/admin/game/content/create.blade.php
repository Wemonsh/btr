@extends('layouts.dashboard')

@section('content')
    <h1>Добавление контента для селекта "{{ $select->name }}" категории "{{ $category->name }}" игры "{{ $game->name }}"</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?game_id='.$game_id.'&category_id='.$category_id.'&select_id='.$select_id.'&action=create' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название">
        </div>
        <div class="form-group">
            <input value="{{ $select->name }}" name="select" type="text" class="form-control" id="select" placeholder="Select" disabled>
        </div>
        <div class="form-group">
            <input value="{{ $category->name }}" name="category" type="text" class="form-control" id="category" placeholder="Category" disabled>
        </div>
        <div class="form-group">
            <input value="{{ $game->name }}" name="game" type="text" class="form-control" id="game" placeholder="Game" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
