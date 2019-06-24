@extends('layouts.dashboard')

@section('content')
    <h1>Редактирование селекта для категории "{{ $category->name }}" и игры "{{ $data->name }}"</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?game_id='.$game_id.'&category_id='.$category_id.'&id='.$data->id.'&action=edit' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input value="{{ $data->name }}" name="name" type="text" class="form-control" id="name" placeholder="Название">
        </div>
        <div class="form-group">
            <label for="placeholder">Placeholder</label>
            <input value="{{ $data->placeholder }}" name="placeholder" type="text" class="form-control" id="placeholder" placeholder="Placeholder">
        </div>
        <div class="form-group">
            <input value="{{ $game->name }}" name="game" type="text" class="form-control" id="game" placeholder="Game" disabled>
        </div>
        <div class="form-group">
            <input value="{{ $category->name }}" name="category" type="text" class="form-control" id="category" placeholder="Category" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection