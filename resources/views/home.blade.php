@extends('layouts.default')

@section('title', 'თიბისი ბანკი')

@section('content')
    <div class="body-header">
        <div class="area">
            <p>ხმოვანი ასისტენტი მობაილბანკშია</p>
            <button type="button" class="btn btn-success">გაიგე მეტი</button>
            <div class="services">
                <div class="serviceUnit">
                    <a href="">
                        <img src="{{ asset('img/online-help.png') }}">
                        <p>ონლაინ კონსულტაციის მიღება</p>
                    </a>
                </div>
                <div class="serviceUnit">
                    <a href="">
                        <img src="{{ asset('img/transactions.png') }}">
                        <p>მობილურით გადარიცხვა</p>
                    </a>
                </div>
                <div class="serviceUnit">
                    <a href="">
                        <img src="img/loans.png">
                        <p>სესხის აღება</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="body-posts">
        <div class="area">
            @if(count($posts)==2)
            <a href="{{ route('showposts',["id"=>$posts[0]->id]) }}">
                <div class="post post-L" style="background-image: url('{{ asset('img') }}/{{ $posts[0]->img  }}')">
                    <div class="post-title">
                        {{ $posts[0]->title }}
                    </div>
                </div>
            </a>
            <a href="{{ route('showposts',["id"=>$posts[1]->id]) }}">
                <div class="post" style="background-image: url('{{ asset('img') }}/{{ $posts[1]->img  }}')">
                    <div class="post-title">
                        {{ $posts[1]->title }}
                    </div>
                </div>
            </a>
            @endif
            <a href="#">
                <div class="post-small post-L">
                    <div class="rates">
                        <img src="{{ asset('img/usa.png') }}" alt=""> <span>{{$client->GetCurrency('USD')}}</span> <br>
                        <img src="{{ asset('img/britain.png') }}" alt=""> <span>{{$client->GetCurrency('GBP')}}</span> <br>
                        <img src="{{ asset('img/euro.png') }}" alt="">  <span>{{$client->GetCurrency('EUR')}}</span> <br>
                    </div>
                    <div class="rates">
                        <img src="{{ asset('img/flags/CZK.png') }}" alt=""> <span>{{$client->GetCurrency('CZK')}}</span> <br>
                        <img src="{{ asset('img/flags/RUB.png') }}" alt=""> <span>{{$client->GetCurrency('RUB')}}</span> <br>
                        <img src="{{ asset('img/flags/DKK.png') }}" alt="">  <span>{{$client->GetCurrency('DKK')}}</span> <br>
                    </div>
                </div>
            </a>
            <a class="newsA" href="{{url('/posts')}}">
                <div class="post-small">
                    <img class="news" src="{{ asset('img/new.png') }}" alt="">  <br> <span>სიახლეები</span>
                </div>
            </a>
        </div>
    </div>
@endsection