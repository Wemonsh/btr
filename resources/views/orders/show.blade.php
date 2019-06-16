@extends('layouts.blank')

@section('content')
        <div class="row">
            <div class="col-8 mt-3">
                <div class="row">
                    <div class="form-group">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach(json_decode($order->images) as $file)
                                    @if($file->id == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$file->id}}" class="active"></li>
                                    @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$file->id}}"></li>
                                    @endif
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach(json_decode($order->images) as $file)
                                    @if($file->id == 0)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('/storage/' . $file->path) }}" class="d-block w-100" height="250px" alt="Изображение отсутствует">
                                    </div>
                                    @else
                                        <div class="carousel-item">
                                            <img src="{{ asset('/storage/' . $file->path) }}" class="d-block w-100" height="250px" alt="Изображение отсутствует">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                <div class="form-group col-6">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Описание</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Информация о покупке</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{{ $order->description }}</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-4 mt-3">
                <form class="form-create"
                      action="{{ route('orderBuy', [$gameAlias, $serviceAlias, $order['id']]) }}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card" >
                        <div class="card-body">
                            <h1 class="card-text">{{ $order->game->name }}</h1>
                            <p>Продавец: {{ $order->seller->name }}</p>
                            <hr>
                            @foreach(json_decode($order->properties) as $file)
                                <p>{{ $file->placeholder }}: {{ $file->select }}</p>
                                <hr>
                            @endforeach
                            <p>К оплате: <span class="font-weight-bold">{{ $order->cost }}</span> &#8381;</p>
                            <button type="submit">Оплатить с робокассы</button>
                            <p class="small">Услуга гаранта включена в стоимость</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection

