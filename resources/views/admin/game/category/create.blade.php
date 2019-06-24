@extends('layouts.dashboard')

@section('content')
    <h1>Добавление новой категории для игры "{{ $data->name }}"</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?game_id='.$game_id.'&action=create' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название">
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <input name="alias" type="text" class="form-control" id="alias" placeholder="Alias">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" rows="12"></textarea>
        </div>
        <div class="form-group">
            <input value="{{ $data->name }}" name="game" type="text" class="form-control" id="game" placeholder="Game" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection