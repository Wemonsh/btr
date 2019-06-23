@extends('layouts.dashboard')

@section('content')
    <h1>Добавление игры</h1>
    <hr>

    <form method="post" action="{{ request()->url().'?action=create' }}" enctype="multipart/form-data">
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
            <label for="card_image">Card Image</label>
            <input name="card_image" type="file" class="form-control-file" id="card_image">
        </div>
        <div class="form-group">
            <label for="full_image">Full Image</label>
            <input name="full_image" type="file" class="form-control-file" id="full_image">
        </div>
        <div class="form-group">
            <label for="background">Background</label>
            <input name="background" type="text" class="form-control" id="background" placeholder="Background">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection