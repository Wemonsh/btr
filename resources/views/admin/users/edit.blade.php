@extends('layouts.dashboard')

@section('content')
    <h1>Редактирование пользователя "{{ $user->name }}"</h1>
    <hr>
    <form method="post" action="{{ route('usersEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Логин</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Логин" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            @if($user->photo != null)
                <img src="{{ asset('/storage/' . $user->photo) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
            @else
                <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
            @endif
            <p>Изменить изображение карточки</p>
            <input name="photo" type="file" class="form-control-file mt-3" id="photo">
            <hr>
        </div>
        <div class="form-group">
{{--            @foreach($roles as $value)--}}
{{--                @foreach($user->roles as $item)--}}
{{--                @if($item->id == $value->id)--}}
{{--                    <div class="form-check">--}}
{{--                        <label class="form-check-label">--}}
{{--                            <input id="role" name="role[]" type="checkbox" class="form-check-input" value="{{ $value->id }}" checked>{{ $value->name }}--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    @else--}}
{{--                        <div class="form-check">--}}
{{--                            <label class="form-check-label">--}}
{{--                                <input id="role" name="role[]" type="checkbox" class="form-check-input" value="{{ $value->id }}">{{ $value->name }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                @endif--}}
{{--                @endforeach--}}
{{--            @endforeach--}}
{{--            @if($user_roles == 0)--}}
{{--                    @foreach($roles as $value)--}}
{{--                        <div class="form-check">--}}
{{--                            <label class="form-check-label">--}}
{{--                                <input id="role" name="role[]" type="checkbox" class="form-check-input" value="{{ $value->id }}">{{ $value->name }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--            @endif--}}
            @foreach($roles as $value)
                    @if($user->hasRole($value->name))
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="role" name="role[]" type="checkbox" class="form-check-input" value="{{ $value->id }}" checked>{{ $value->name }}
                            </label>
                        </div>
                    @else
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="role" name="role[]" type="checkbox" class="form-check-input" value="{{ $value->id }}">{{ $value->name }}
                            </label>
                        </div>
                    @endif
                @endforeach
            @if($user_roles == 0)
                @foreach($roles as $value)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input id="role" name="role[]" type="checkbox" class="form-check-input" value="{{ $value->id }}">{{ $value->name }}
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="balance">Баланс</label>
            <input name="balance" type="number" class="form-control" id="balance" placeholder="Баланс" value="{{ $user->balance }}">
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection