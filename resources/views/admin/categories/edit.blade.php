@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categoriesIndex') }}">Категории</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать категорию</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактирование категории</h1>
    <hr>
    <form method="post" action="{{ route('categoriesEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="{{ $service_category->name }}">
        </div>
        <div class="form-group">
            <label for="placeholder">Placeholder</label>
            <input name="placeholder" type="text" class="form-control" id="placeholder" placeholder="Placeholder" value="{{ $service_category->placeholder }}">
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection