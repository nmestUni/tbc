@extends('layouts.ibank')

@section('title', 'პროდუქტები')

@section('content')

{!! Form::open(["action"=>"TransfersController@send","method"=>"post", "enctype" => "multipart/form-data","class"=>""]) !!}
    <div class="transfer">
        <div class="transfer-block transfer-left">
            <p>ანგარიშიდან</p>
            <select class="form-control" name="id">
                @foreach ($cards as $card) 
                <option value="{{$card->id}}">{{$card->accNum}}</option>
                @endforeach
            </select>
        </div>
        <div class="transfer-block">
            <p>ანგარიშზე</p>
            <input type="text" class="form-control" name="who">
        </div>
        <div class="transfer-block transfer-right">
            <p>თანხა</p>
            <input type="text" class="form-control" name="amount">
        </div>
    </div>
    <div class="d-flex justify-content-end">
    
        <button class="btn btn-primary">გადარიცხვა</button>
    </div>
{!! Form::close() !!}
@endsection