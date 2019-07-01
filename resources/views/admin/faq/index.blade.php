@extends('layouts.dashboard')

@section('content')
    <h1>ЧАВО для категории: {{ $category->name }}</h1>
    <hr>
    <a class="btn btn-primary mb-3" href="{{ route('faqAdmin').'?category_id='.$category_id.'&action=create' }}">Добавить новое ЧАВО</a>
    <a class="btn btn-primary mb-3" href="{{ route('faqAdmin') }}">Назад</a>
    <table class="table table-bordered table-sm">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Вопрос</th>
            <th class="align-middle text-center" scope="col">Ответ</th>
            <th class="align-middle text-center" scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">{{ $value->question }}</td>
                <td class="align-middle text-center">{{ $value->answer }}</td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?category_id='.$category_id.'&id='.$value->id.'&action=edit' }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?category_id='.$category_id.'&id='.$value->id.'&action=delete' }}" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection