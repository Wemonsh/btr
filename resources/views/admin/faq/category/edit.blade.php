@extends('layouts.dashboard')

@section('content')
    <h1>Редактирование категории ЧАВО "{{ $data->name }}"</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?id='.$data->id.'&action=edit' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="{{ $data->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection
