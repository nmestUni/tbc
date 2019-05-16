@extends('layouts.ibank')

@section('title', 'პროდუქტები')

@section('content')
    <div class="basic-info">
        <div class="left-info">
            <p class="card-name">ბარათის სახელი</p>
            <p>GE00FF0111000012131010</p>
            <a href=" {{ url('/userhome/transfers') }} "><button type="button" class="btn btn-dark">გადარიცხვა</button></a>
        </div>
        <div class="right-info">
            <p class="card-name">ხელმისაწვდომი</p>
            <p>100.00 GEL</p>
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
                    SAXELI GVARI
                </td>
            </tr>
            <tr>
                <td>
                    ბარათის ვადა
                </td>
                <td class="last">
                    30/10/2020
                </td>
            </tr>
            <tr>
                <td>
                    ბარათის ნომერი
                </td>
                <td class="last">
                    **** **** **** 00000
                </td>
            </tr>
            <tr>
                <td>
                    სტატუსი
                </td>
                <td class="last">
                    აქტიური
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
            <tr>
                <td>
                    11/12/2018
                </td>
                <td>
                    GE00FF123123000000000
                </td>
                <td class="last">
                    50.00 GEL
                </td>
            </tr>

        </table>
    </div>
@endsection