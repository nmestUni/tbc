
@extends('layouts.default')

@section('title', 'ვალუტის კურსები')

@section('content')
    <div class="body-header currency-header">
        <div class="area">
            <p>ვალუტის კურსები</p>
        </div>
    </div>
    <div class="body-posts">
        <div class="area">
            <div>
                <div class="course course-L">
                    <div class="top">
                        <img style="background-image: url({{asset('img/usa.png')}})">
                        <div>
                            <span>USD</span>
                            <p></p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div>
                            <p class="small">კურსი</p>
                            <p>{{$client->getCurrency('USD')}}</p>
                        </div>
                        <div>
                            <p class="small">ცვლილება</p>
                            <p>{{substr($client->GetCurrencyChange('USD'), 0, 5)}}</p>
                        </div>
                    </div>
                </div>
                <div class="course">
                    <div class="top">
                        <img style="background-image: url({{asset('img/britain.png')}})">
                        <div>
                            <span>GBP</span>
                            <p></p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div>
                            <p class="small">კურსი</p>
                            <p>{{$client->getCurrency('GBP')}}</p>
                        </div>
                        <div>
                            <p class="small">ცვლილება</p>
                            <p>{{substr($client->GetCurrencyChange('GBP'), 0, 5)}}</p>
                        </div>
                    </div>
                </div>
                <div class="course">
                    <div class="top">
                        <img style="background-image: url({{asset('img/euro.png')}})">
                        <div>
                            <span>EUR</span>
                            <p></p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div>
                            <p class="small">კურსი</p>
                            <p>{{$client->getCurrency('EUR')}}</p>
                        </div>
                        <div>
                            <p class="small">ცვლილება</p>
                            <p>{{substr($client->GetCurrencyChange('EUR'), 0, 5)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calculator">
                <p> ვალუტის კალკულატორი</p>
                <select class="form-control" id="currency_from">
                    <option value="GEL">GEL ქართული ლარი</option>
                    @foreach($currencies as $currency)
                        <option value="{{$currency}}">{{$client->GetCurrencyDescription($currency)}}</option>
                    @endforeach
                </select>
                <select class="form-control" id="currency_to">
                    @foreach($currencies as $currency)
                        <option value="{{$currency}}">{{$client->GetCurrencyDescription($currency)}}</option>
                    @endforeach
                    <option value="GEL">GEL ქართული ლარი</option>
                </select>
                <div class="input-group">
                    <input type="text" class="form-control" id="amount">
                    <div class="input-group-append">
                        <span class="input-group-text" id="currencyChangeResult">0.00</span>
                    </div>
                </div>
                <button type="button" class="btn btn-dark" onclick="calculate()">კონვერტაცია</button>
            </div>
            <div class="all-currencies">
                <p>ყველა ვალუტა</p>
                <table>
                    @foreach($currencies as $currency)
                        <tr>
                            <td>
                                <img src="{{asset('img/flags/'.$currency.'.png')}}">
                            </td>
                            <td class="currency-name">
                                {{$currency}}
                            </td>
                            <td class="currency-desc">
                                {{$client->GetCurrencyDescription($currency)}}
                            </td>
                            <td class="currency-rate">
                                {{$client->GetCurrency($currency) }}
                            <td class="currency-rate">
                                {{substr($client->GetCurrencyChange($currency), 0, 5)  }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var map;
        var service;
        var infowindow;

        function initMap() {
          var centerPlace = {lat: 42.2453603, lng: 42.3951167};

          infowindow = new google.maps.InfoWindow();

          map = new google.maps.Map(
              document.getElementById('map'), {center: centerPlace, zoom: 5});

          var request = {
            query: 'tbc',
            fields: ['name', 'geometry'],
          };

          var service = new google.maps.places.PlacesService(map);

          service.findPlaceFromQuery(request, function(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
              for (var i = 0; i < results.length; i++) {
                createMarker(results[i]);
              }
              map.setCenter(centerPlace);
            }
            console.log(status);
          });
        }

        function toggleResp() {
            var x = document.getElementById("headerTopnav");
            if (x.className === "topnav-c") {
                x.className += " responsive";
            } else {
                x.className = "topnav-c";
            }
        }

        function calculate() {
            var currency_from = document.getElementById("currency_from").value;
            var currency_to = document.getElementById("currency_to").value;
            var amount = document.getElementById('amount').value;
            $.ajax({
                url: 'calculateCurrency',
                type: "get",
                data: {from: currency_from, to: currency_to, amount: amount},
                success: function(response) {
                    document.getElementById('currencyChangeResult').innerText = response;
                }
            })

        }
    </script>
@endsection