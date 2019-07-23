@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('rolesAdmin') }}">Роли</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование роли "{{ $role->name }}"</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактирование роли "{{ $role->name }}"</h1>
    <hr>
    <form method="post" action="{{ route('rolesEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="{{ $role->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection