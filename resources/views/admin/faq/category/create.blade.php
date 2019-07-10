@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление новой категории ЧАВО</li>
        </ol>
    </nav>
@endsection

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
