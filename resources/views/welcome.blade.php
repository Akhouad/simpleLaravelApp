<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header clearfix" style="padding:20px 0">
            <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                <a class="nav-link {{(Route::currentRouteName() == 'home') ? 'active' : ''}}" href="{{route('home')}}">Accueil</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{(Route::currentRouteName() == 'login') ? 'active' : ''}}" href="{{route('login')}}">Se connecter</a>
                </li>
                <li class="nav-item">
                <a class="nav-link  {{(Route::currentRouteName() == 'register') ? 'active' : ''}}" href="{{route('register')}}">S'inscrire</a>
                </li>
            </ul>
            </nav>
            <h3 class="text-muted" style="float:left">Social isil</h3>
        </div>
    </div>
    
    <div class="site-wrapper" style="background-color: #333;">

  <div class="site-wrapper-inner">

    <div class="cover-container">
        

      <div class="inner cover">
        <img style="position:absolute;top:80px;left:0;width:100%;height:calc(100% - 80px);opacity:.1" src="{{asset('storage/images/background.jpg')}}" alt="">
        <h1 class="cover-heading" style="position:relative;z-index:99">Bienvenue à ESTE.</h1>
        <p class="lead" style="position:relative;z-index:99">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <p class="lead" style="position:relative;z-index:99">
          <a href="/login" class="btn btn-lg btn-secondary">Se connecter</a>
        </p>
      </div>

      <div class="mastfoot">
        <div class="inner">
          <p>Créé par Amine Akhouad.</p>
        </div>
      </div>

    </div>

  </div>

</div>


    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
