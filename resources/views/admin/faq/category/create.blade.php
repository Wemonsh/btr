@extends('layouts.dashboard')

@section('content')
    <h1>Добавление новой категории ЧАВО</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?action=create' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
