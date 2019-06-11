@extends('layouts.game')

@section('header')
    <div class="profile-header">
        <div class="container">
            <h1 class="headline">{{ $game['name'] }}</h1>
            @foreach($game['gaming_services'] as $service)
                @if($service['alias'] == $serviceAlias)
                    <p class="description">{{ $service['alias'].' - '.$service['description'] }}</p>
                @endif
            @endforeach
        </div>
    </div>

    <style>
        .profile-header {
            padding-top: 75px;
            min-height: 700px;
            background: url('{{ $game['full_image'] }}') 100% 13% no-repeat, {{ $game['background'] }};
            background-position: top right, center;
        }
    </style>
@endsection

@section('content')
    <nav>
        <div class="nav nav-tabs">
            @foreach($game['gaming_services'] as $service)
                <a class="nav-item nav-link{{ $service['alias'] == $serviceAlias ? ' active' : null }}" href="/{{ $gameAlias }}/{{ $service['alias'] }}" >{{ $service['name'] }}</a>
            @endforeach
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                <div class="col-10">
                    <form action="#" class="form-inline filter">

                        @forelse($selects['category'] as $select)
                            <div class="form-group">
                                <select class="form-control" name="{{ $select['name'] }}">
                                    <option selected disabled>{{ $select['placeholder'] }}</option>
                                    @foreach($select['select'] as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @empty
                            <p>Нет категорий поиска</p>
                        @endforelse

                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline" checked>
                            <label class="custom-control-label" for="customControlInline">Продавец онлайн</label>
                        </div>

                    </form>
                </div>
                <div class="col-2">
                    <a href="/{{ $gameAlias }}/{{ $serviceAlias }}/create" class="btn-main">Продать золото</a>
                </div>
            </div>
        </div>
    </div>

    <div class="table-wrapper">

        <table>
            <thead>
                <tr>
                    @foreach($selects['category'] as $select)
                    <th>{{ $select['placeholder'] }}</th>
                    @endforeach
                    <th>Описание</th>
                    <th>Продавец</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        @foreach($order['properties'] as $value)
                            <td>{{ $value->name }}</td>
                        @endforeach
                        <td width="300px">{{ $order['description'] }}</td>
                        <td>{{ $order['seller']['name'] }}</td>
                        <td>{{ $order['cost'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <style>

        .table-wrapper {
            margin-top: 10px;
        }

        .table-wrapper > table {
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0px 20px 40px -20px #bec6de;
            border-radius: 6px;
        }

        .table-wrapper > table > thead > tr > th {
            background: #f2f3f6;
            border-radius: 6px 6px 0 0;
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            text-align: center;
            padding: 20px 0px;
        }

        .table-wrapper > table > tbody > tr > td {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            text-align: center;
            padding: 20px 0px;
            border-top: 1px solid #f2f3f6;
        }

        form {
            margin-block-end: 0em;
        }

        .btn-main {
            display: block;
            text-align: center;
            margin: 0 auto;
            width: 100%;
            font-size: 18px;
            text-decoration: none;
            padding: 15px;
            background: linear-gradient(135deg, #0B7FFF, #01F6FD);
            border-radius: 30px;
            color: #ffffff !important;
            transition: 2s;
            box-shadow: 0px 20px 40px -20px #bec6de;
        }

        .btn-main:hover {
            cursor: pointer;
            box-shadow: 0px 20px 40px -20px #01F6FD;
            text-decoration: none;
        }

        .filter select {
            min-width: 220px;
            height: 60px;
            margin-right: 30px;
            border-radius: 29px;
            background: #f2f3f6;
            box-shadow: 0px 20px 40px -20px #bec6de;
        }


        .profile-header .headline {
            color: #ffffff;
            font-size: 42px;
            font-weight: 400;
            line-height: 56px;
        }

        .profile-header .description {
            color: #ffffff;
            font-size: 18px;
            font-weight: 400;
        }

        .nav-tabs {
            border-bottom: none;
        }

        .tab-content {
            padding: 30px 40px;
            border-radius: 0px 6px 6px 6px;
        }
        .nav-tabs > .nav-item {
            position: relative;
            border: none;
            padding: 20px 40px;
            color: #ffffff;
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;

        }

        .nav-tabs > .active:after {
            content: '';
            top: 0;
            left: 0;
            position: absolute;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #0B84FF, #02EDFD);
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }

        .tab-content {
            background-color: #ffffff;
        }
    </style>

@endsection