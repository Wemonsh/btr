@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ordersAdmin') }}">Заказы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Подробности заказа № {{ $order->id }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Подробности заказа № {{ $order->id }}</h1>
    <hr>
    <section id="order">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    @if(!empty($order->images))
                        <div class="images">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach(json_decode($order->images) as $file)
                                        @if($file->id == 0)
                                            <div class="carousel-item active">
                                                <img src="{{ asset('/storage/' . $file->path) }}" class="d-block w-100" height="600px" style="object-fit: cover;" alt="Изображение отсутствует">
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <img src="{{ asset('/storage/' . $file->path) }}" class="d-block w-100" height="600px" style="object-fit: cover;" alt="Изображение отсутствует">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="description">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                   role="tab" aria-controls="home" aria-selected="true">Описание</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                   role="tab" aria-controls="profile" aria-selected="false">Информация о
                                    покупке</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <p>{{ $order->description }}</p>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <p>...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="information">
                        <h1>{{ $order->game->name }}</h1>
                        <p><strong>Категория:</strong> {{ $order->service->name }}</p>
                        <ul>
                            @foreach(json_decode($order->properties) as $file)
                                <li>{{ $file->placeholder }}: {{ $file->name }}</li>
                            @endforeach
                            <li>Продавец: {{ $order->seller->name }}</li>
                            @if($order->customer != null)
                                <li>Покупатель: {{ $order->customer->name }}</li>
                            @endif
                        </ul>
                        <p class="cost">К оплате: <strong>{{ $order->cost }} &#8381;</strong></p>
                        @if($order->paid != 0)
                            <p class="description text-success">Заказ оплачен</p>
                        @else
                            <p class="description text-danger">Заказ не оплачен</p>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <p class="font-weight-bold">Чат:</p>
                @if(count($messages) != 0)
                    @foreach($messages as $item)
                        <p><span class="text-muted">{{ $item->user->name }}</span>: {{ $item->message }} <small class="text-muted">{{$item->created_at}}</small></p>
                    @endforeach
                @else
                    <p>Сообщения отсутсвуют</p>
                @endif
            </div>
        </div>
    </section>
@endsection