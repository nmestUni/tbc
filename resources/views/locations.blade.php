@extends('layouts.default')

@section('title', 'ფილიალები და ბანკომატები')

@section('content')
    <div class="body-header currency-header">
        <div class="area">
            <p>ფილიალები და ბანკომატები</p>
        </div>
    </div>
    <div class="body-posts">
        <div class="area">
            <div id="map"></div>
        </div>
    </div>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRfCwUBk_TN_4ULbKgXytYjSacFSGF09Y&libraries=places&callback=initMap"></script>
@endsection