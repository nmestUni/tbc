<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/iconTBC.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/external.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/custom.js') }}" charset="utf-8"></script>
  </head>
  <header>
    <div class="preHeader">
      <div class="header-content">
        <a href="{{ route('home') }}">მთავარი</a>
        <a href="{{ route('contact') }}">კონტაქტი</a>
        <a href="">ჩვენ შესახებ</a>
        <a href="{{ route("posts") }}">სიახლეები</a>
        <img src="{{ asset('img/georgia-flag.png') }}" alt="">
      </div>
    </div>
    <div class="postHeader">
      <div class="header-content">
        <a href="{{ route('home') }}">
          <img src="{{ asset('img/tbc-logo.svg') }}" alt="logo">
        </a>
        <a href="{{ route('login') }}">
          <div class="ibank">
            <img src="{{ asset('img/lock.png') }}" alt="lock">
            <p>ინტერნეტბანკი</p>
          </div>
        </a>
      </div>
    </div>
    <div class="menu">
      <div class="header-content">
        <div class="topnav-c" id="headerTopnav">
          <div class="dropdown-c">
            <button class="dropbtn-c">
              <a href="" class="menuItem">ჩემთვის</a>
            </button>
            <div class="dropdown-c-content">
              <a href="">ანაბრები</a>
              <a href="">სესხები</a>
              <a href="">იპოთეკური ცენტრი</a>
              <a href="">საკრედიტო ბარათები</a>
            </div>
          </div>
          <div class="dropdown-c">
            <button class="dropbtn-c">
              <a href="" class="menuItem">ჩემი ბიზნესისთვის</a>
            </button>
            <div class="dropdown-c-content">
              <a href="">ბიზნესის ფინანსირება</a>
              <a href="">თიბისი ბიზნესი</a>
              <a href="">სტარტაპერი</a>
              <a href="">ანგარიშის გახსნას</a>
            </div>
          </div>
          <a href="" class="menuItem">თიბისი სტატუსი</a>
          <a href="javascript:void(0);" class="icon" onclick="toggleResp()">&#9776;</a>
        </div>
      </div>
    </div>
  </header>

  <body>
    <div class="navigationBox">
      <div class="navboxItem">
        <a href="">
          <img src="{{ asset('img/chat.png') }}" alt="">
          <span class="navboxSpan">ონლაინ კონსულტაცია</span>
        </a>
      </div>
      <div class="navboxItem">
        <a href="{{ url('/locations') }}">
          <img src="{{ asset('img/map.png') }}" alt="">
          <span class="navboxSpan">ფილიალები და ბანკომატები</span>
        </a>
      </div>
      <div class="navboxItem">
        <a href="{{ url('/currencies') }}">
          <img src="{{ asset('img/gochi.png') }}" alt="">
          <span class="navboxSpan">ვალუტის კურსები</span>
        </a>
      </div>
    </div>
    <div class="content">
      @yield('content')
    </div>
  </body>

  <footer>
    <div class="footerMenu">
      <div class="footerMenuItem left">
        <a class="title" href="">ჩემთვის</a>
        <table>
          <ul><a href="">ანაბრები</a></ul>
          <ul><a href="">სესხები</a></ul>
          <ul><a href="">იპოთეკური ცენტრი</a></ul>
          <ul><a href="">საკრედიტო ბარათები</a></ul>
        </table>
      </div>
      <div class="footerMenuItem centre">
        <a class="title" href="">ჩემი ბიზნესისთვის</a>
        <table>
          <ul><a href="">ბიზნესის ფინანსირება</a></ul>
          <ul><a href="">თიბისი ბიზნესი</a></ul>
          <ul><a href="">სტარტაპერი</a></ul>
          <ul><a href="">ანგარიშის გახსნას</a></ul>
        </table>
      </div>
      <div class="footerMenuItem right">
        <a class="title" href="">თიბისი სტატუსი</a>
      </div>
    </div>
    <div class="footerLinks">
      <div class="area">
        <table>
          <ul>
            <li><a href="{{ url('/contact') }}">დაგვიკავშირდით</a></li>
            <li><a href="{{ url('/locations') }}">ფილიალები და ბანკომატები</a></li>
            <li><a href="">ხელშეკრულებები</a></li>
          </ul>
        </table>
      </div>
    </div>
  </footer>
</html>
