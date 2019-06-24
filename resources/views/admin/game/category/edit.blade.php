@extends('layouts.dashboard')

@section('content')
    <h1>Редактирование категории "{{ $data->name }}" для игры "{{ $data->game->name }}"</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?game_id='.$game_id.'&id='.$data->id.'&action=edit' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <input name="alias" type="text" class="form-control" id="alias" placeholder="Alias" value="{{ $data->alias }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" rows="12" value="{{ $data->description }}"></textarea>
        </div>
        <div class="form-group">
            <input value="{{ $data->game->name }}" name="game" type="text" class="form-control" id="game" placeholder="Game" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection
