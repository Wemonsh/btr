@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('servicesIndex') }}">Услуги</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавить услугу</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Добавление услуги</h1>
    <hr>
    <form method="post" action="{{ route('servicesCreate') }}" enctype="multipart/form-data">
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
            <label for="game">Игра</label>
            <select name="game" class="form-control" id="game">
                @foreach($games as $game)
                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection