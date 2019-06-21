@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Пользователи</h1>
    <hr>
{{--    <div>--}}
{{--        <a class="btn btn-secondary text-light" href="{{ route('gamesCreate') }}">Добавить игру</a>--}}
{{--    </div>--}}
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Логин</th>
            <th class="align-middle text-center" scope="col">Email</th>
            <th class="align-middle text-center" scope="col">Роли</th>
            <th class="align-middle text-center" scope="col">Дата регистрации</th>
            @if(count($users) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="align-middle text-center">{{ $user->id }}</td>
                <td class="align-middle text-center">
                    <a href="#" title="{{ $user->name }}">{{ $user->name }}</a>
                </td>
                <td class="align-middle text-center">{{ $user->email }}</td>
                <td class="align-middle text-center">
                    @foreach($user->roles as $role)
                        @if($role->name == 'admin')
                        <span class="badge badge-success">{{ $role->name }}</span>
                        @else
                        <span class="badge badge-secondary">{{ $role->name }}</span>
                        @endif
                    @endforeach
                </td>
                <td class="align-middle text-center">{{ $user->created_at }}</td>
                <td class="align-middle text-center">
                    @if(count($users) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('usersEdit', $user->id) }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('usersDelete', $user->id) }}" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->render() }}

    <hr>
    <a href="{{ route('usersDeleted') }}" title="Отобразить удаленных пользователей">Отобразить удаленных пользователей</a>
@endsection