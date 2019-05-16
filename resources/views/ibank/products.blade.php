@extends('layouts.ibank')

@section('title', 'პროდუქტები')

@section('content')
    <div class="product">
    @if(count($available_cards))
        <table>
            @foreach($available_cards as $avcards)
            <tr>
                <td>
                    <a href="">
                        {{ Auth::user()->name }}-ს MasterCard
                    </a>
                </td>
                <td class="last">{{ $avcards->balance }} GEL</td>
            </tr>
            @endforeach
        </table>
    @else
    <p>თქვენ არ გაქვთ ბარათი</p>
    @endif
    </div>
    <div class="d-flex justify-content-end">
        {!! Form::open(["action"=>"UserhomeController@requestcard","method"=>"post", "enctype" => "multipart/form-data","class"=>"","class"=>['d-flex',"flex-column"] ]) !!}

            @csrf
            @if($cards==0)
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <button class="btn btn-primary ">ახალი ბარათის მოთხოვნა</button>
            

            @else
            <button class="btn btn-primary disabled">ახალი ბარათის მოთხოვნა</button>
            <small>თქვენი მოთხოვნა მუშავდება</small>
            @endif
        {!! Form::close() !!}
    </div>
@endsection