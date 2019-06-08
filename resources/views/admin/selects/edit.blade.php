@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('selectsIndex') }}">Селекты</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать селект</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактирование селект</h1>
    <hr>
    <form method="post" action="{{ route('selectsEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="{{ $select->name }}">
        </div>
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select name="category_id" class="form-control" id="category_id">
                @foreach($categories as $category)
                    @if($category->id == $select->category_id)
                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection
