@extends('layouts.default')

@section('title', 'კონტაქტი')

@section('content')
    <div class="body-header currency-header">
        <div class="area">
            <p>კონტაქტი</p>
        </div>
    </div>
    <div class="body-posts">
        <div class="area">
            <div class="contact">
                <img src="{{ asset('img/telephone.png') }}">
                <p class="title">+(995 32) 227 00 00</p>
                <p class="desc">დაგვირეკეთ 24 საათის განმავლობაში</p>
            </div>
            <div class="contact">
                <img src="{{ asset('img/email.png') }}">
                <p class="title"> info@info.com.ge</p>
                <p class="desc">დაგვეკონტაქტეთ ელექტრონულ ფოსტაზე</p>
            </div>
            <div class="contact">
                <img src="{{ asset('img/help.png') }}">
                <p class="title">ონლაინ ჩათი</p>
                <p class="desc">გაესაუბრეთ ჩვენს კონსულტანტებს</p>
                <button type="button" class="btn btn btn-success">კონსულტაცია</button>
            </div>
            <div class="contact">
                <img src="{{ asset('img/location.png') }}">
                <p class="title">ეწვიეთ ფილიალს</p>
                <p class="desc">იპოვეთ უახლოესი ფილიალი და ბანკომატი</p>
                <a href="{{ url('/locations') }}">
                    <button type="button" class="btn btn btn-success">მოძებნეთ</button>
                </a>

            </div>
        </div>
    </div>
@endsection