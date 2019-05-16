@extends('layouts.ibank')

@section('title', 'პროდუქტები')

@section('content')
    <div class="transfer">
        <div class="transfer-block transfer-left">
            <p>ანგარიშიდან</p>
            <select class="form-control" >
                <option value="">GE00FF0111000012131010</option>
            </select>
        </div>
        <div class="transfer-block">
            <p>ანგარიშზე</p>
            <input type="text" class="form-control">
        </div>
        <div class="transfer-block transfer-right">
            <p>თანხა</p>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="d-flex justify-content-end">
    
        <button class="btn btn-primary">გადარიცხვა</button>
    </div>
@endsection