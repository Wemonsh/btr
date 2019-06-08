@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('servicesIndex') }}">Услуги</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать услугу</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактирование услуги</h1>
    <hr>
    <form method="post" action="{{ route('servicesEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="{{ $service->name }}">
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <input name="alias" type="text" class="form-control" id="alias" placeholder="Alias" value="{{ $service->alias }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" rows="12" value="{{ $service->description }}"></textarea>
        </div>
        <div class="form-group">
            <label for="game">Игра</label>
            <select name="game" class="form-control" id="game">
                @foreach($games as $game)
                    @if($game->id == $service->game_id)
                        <option selected value="{{ $game->id }}">{{ $game->name }}</option>
                    @else
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection
