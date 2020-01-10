<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('image/logopm.png')}}">
    <title>@yield('title') - PustakaManga</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <!--Darkmode CSS-->
    <link rel="stylesheet" href="{{asset('bootstrap/darkmode/dark-mode.css')}}">
    <!--Costum CSS-->
    <link rel="stylesheet" href="{{asset('/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Light.css')}}">
    <!--Fontawesome-->
    <link href="{{asset('plugins/font-awesome/5.3/css/fontawesome-all.min.css')}}" rel="stylesheet" />
    <!--Select-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />





  </head>

  <body>
    <nav class="navbar fixed-top navbar-expand-lg text-nowrap navbar-light bg-light">
        <div class="container">
            <a class="p-0 navbar-brand" href="{{ route('front.index') }}">PustakaManga</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('front.index') }}"><span class="fas fa-university fa-fw "></span> Beranda</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('manga.list') }}"><span class="fas fa-book fa-fw " aria-hidden="true"></span> Daftar Manga</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{ route('manga.search') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
        </div>
      </nav>

    @yield('content')

    <footer class="footer">
        <p class="m-0 text-center text-muted"> © 2019-2020 PustakaManga</p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/darkmode/dark-mode-switch.min.js')}}"></script>
  </body>
</html>
