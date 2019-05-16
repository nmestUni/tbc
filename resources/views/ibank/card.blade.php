@extends('layouts.ibank')

@section('title', 'პროდუქტები')

@section('content')
    <div class="basic-info">
        <div class="left-info">
            <p class="card-name">ბარათის სახელი</p>
            <p>{{$card->accNum}}</p>
            <a href=" {{ url('/userhome/transfers') }} "><button type="button" class="btn btn-dark">გადარიცხვა</button></a>
        </div>
        <div class="right-info">
            <p class="card-name">ხელმისაწვდომი</p>
            <p>{{$card->balance}}</p>
        </div>
    </div>
    <div class="card-details">
        <div class="top">
            <span>დეტალები</span>
        </div>
        <table>
            <tr>
                <td>
                    ბარათის მფლობელი
                </td>
                <td class="last">
                    {{Auth::user()->name}}
                    {{Auth::user()->surname}}
                </td>
            </tr>
            <tr>
                <td>
                    ბარათის ვადა
                </td>
                <td class="last">
                    {{$card->date}}
                </td>
            </tr>
            <tr>
                <td>
                    ბარათის ნომერი
                </td>
                <td class="last">
                    {{$card->cardNumber}}
                </td>
            </tr>
            <tr>
                <td>
                    სტატუსი
                </td>
                <td class="last">
                    @if($card->is_active==0)
                     არა აქტიური
                    @else
                        აქტიური

                    @endif
                </td>
            </tr>
        </table>
    </div>
    <div class="card-details">
        <div class="top">
            <span>ტრანზაქციები</span>
        </div>
        <table>
            <tr class="table-header">
                <td>თარიღი</td>
                <td>მიმღები</td>
                <td class="last">თანხა</td>
            </tr>
            @foreach($trans as $tran)
                 <tr>
                <td>
                    {{$tran->created_at}}
                </td>
                <td>
                    {{$tran->receiverId}}
                </td>
                <td class="last">
                    {{ $tran->amount }}
                </td>
            </tr>
            @endforeach
            
           

        </table>
    </div>
@endsection