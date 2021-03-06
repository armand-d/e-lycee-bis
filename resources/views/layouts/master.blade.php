<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-lycée @yield('title') </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    {!!Html::style('assets/stylesheets/styles.css')!!}
    {!!Html::style('assets/stylesheets/animate.css')!!}
    {!!Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css')!!}

</head>
<body>
    <div id="no-click-search"></div>
    <div id="no-click-loader-search"><img src="{{Request::root('/').'/assets/images/loader-search.svg'}}" class="col-lg-24" alt=""></div>
    @include('front-office.partials.search')
    @include('front-office.partials.menu-mobil')
<header>
@include('front-office.partials.header')
</header>

<div>
    @if(Route::current()->getPath() === '/')
        @include('front-office.partials.slider')
    @endif
    <div class="container">
        @include('errors.alert')
        @yield('content')
    </div>
</div>

@if (!Auth::check() || Route::current()->getPath() === '/' || Route::current()->getPath() === 'contact' || Route::current()->getPath() === 'actualites')
<footer class="hidden-xs">
    @include('front-office.partials.footer')
</footer>
@endif

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.7&appId=1679877968935520";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    {!!Html::script('https://code.jquery.com/jquery-3.1.0.min.js')!!}
    {!!Html::script('assets/javascripts/bootstrap.min.js')!!}
    {!!Html::script('assets/javascripts/script.js')!!}

</body>
</html>