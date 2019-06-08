@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('gamesIndex') }}">Игры</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать игру</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Изменение игры</h1>
    <hr>
    <form method="post" action="{{ route('gamesEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="{{ $game->name }}">
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <input name="alias" type="text" class="form-control" id="alias" placeholder="Alias" value="{{ $game->alias }}">
        </div>
        <div class="form-group">
            @if($game->card_image != null)
                <img src="{{ asset('/storage/' . $game->card_image) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
            @else
                <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
            @endif
            <p>Изменить изображение карточки</p>
            <input name="card_image" type="file" class="form-control-file mt-3" id="card_image">
            <hr>
        </div>
        <div class="form-group">
            @if($game->full_image != null)
                <img src="{{ asset('/storage/' . $game->full_image) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
            @else
                <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
            @endif
            <p>Изменить полноформатное изображение</p>
            <input name="full_image" type="file" class="form-control-file mt-3" id="full_image">
            <hr>
        </div>
        <div class="form-group">
            <label for="background">Background</label>
            <input name="background" type="text" class="form-control" id="background" placeholder="Background" value="{{ $game->background }}">
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection