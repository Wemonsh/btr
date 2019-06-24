@extends('layouts.dashboard')

@section('content')
    <h1>Редактирование игры "{{ $data->name }}"</h1>
    <hr>
    <form method="post" action="{{ request()->url().'?id='.$data->id.'&action=edit' }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <input name="alias" type="text" class="form-control" id="alias" placeholder="Alias" value="{{ $data->alias }}">
        </div>
        <div class="form-group">
            @if($data->card_image != null)
                <img src="{{ asset('/storage/' . $data->card_image) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
            @else
                <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
            @endif
            <p>Изменить изображение карточки</p>
            <input name="card_image" type="file" class="form-control-file mt-3" id="card_image">
            <hr>
        </div>
        <div class="form-group">
            @if($data->full_image != null)
                <img src="{{ asset('/storage/' . $data->full_image) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
            @else
                <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
            @endif
            <p>Изменить полноформатное изображение</p>
            <input name="full_image" type="file" class="form-control-file mt-3" id="full_image">
            <hr>
        </div>
        <div class="form-group">
            <label for="background">Background</label>
            <input name="background" type="text" class="form-control" id="background" placeholder="Background" value="{{ $data->background }}">
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection