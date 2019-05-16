@extends('layouts.ibank')

@section('title', 'პროდუქტები')

@section('content')
    @if(count($available_cards))
            @foreach($available_cards as $avcards)
    <div class="product">
        <table>
            <tr>
                <td>
                    <a href="{{ route('showcards',["id"=>$avcards->id]) }}">
                        {{ Auth::user()->name }}-ს MasterCard
                    </a>
                </td>
                <td class="last">{{ $avcards->balance }} GEL</td>
            </tr>
        </table>
    </div>
            @endforeach
    @else
    <p>თქვენ არ გაქვთ ბარათი</p>
    @endif
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