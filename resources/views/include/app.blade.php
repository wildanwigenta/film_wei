<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>film_wei</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <style>
      body{
        background-image: url("{{ asset('image') }}/wp2.jpg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
      }
      .border-title::before{
        border-left: 1px 
      }
      .card{
        transition: all .2s;
      }
      .card:hover{
        box-shadow: 0 0 20px rgb(88, 187, 204);
        transform: scale(1.05)
      }
      a{
        text-decoration: none;
      }
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap');   

      .container-page {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 70px;
        margin-bottom: 30px;
        gap: 12px;
      }

      .btn-page {
        border: 2px solid #ffffff;
        width: 40px;
        height: 40px;
        background-color: #860505;
        cursor: pointer;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .btn-page:active,
      .btn-page:hover {
        background-color: #ffffff;
      }

      .icon {
        width: 24px;
        height: 24px;
        stroke: #ffffff;
      }

      .btn-page:hover .icon {
        stroke: rgb(255, 0, 0);
      }

      .page--link:link,
      .page--link:visited {
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        color: #ffffff;
        background-color: transparent;
        padding: 17px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 36px;
        width: 36px;
      }

      .page--link:active,
      .page--link:hover,
      .page--link.page--link--current {
        background-color: #860505;
        color: #fff;
        border-radius: 50%;
      }

      .link-container {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      span {
        color: #adb5bd;
      }
    </style>
  </head>
  <body>
    <div class="site-navbar position-fixed" id="navbar" style="transition: 0.3s;width:100%;z-index:100;">
      <nav class="navbar navbar-dark navbar-expand-lg bg-dark ">
          <div class="container-fluid ">
            <!-- <a class="navbar-brand" href="#">Film_wei</a> -->
            <a href="/"><img src="{{ asset('image') }}/logo.png" alt="" width="100px" style="margin-left:15px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                <li class="nav-item">
                  <a class="nav-link {{ $navbar == "home" ? "active" : '' }}" aria-current="page" href="/"><b>Home</b></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link {{ $navbar == "popular" ? "active" : '' }}" href="/popular"><b>Popular</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ $navbar == "top_rated" ? "active" : '' }}" href="/top_rated"><b>Top Rated</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ $navbar == "now_playing" ? "active" : '' }}" href="/now_playing"><b>Now Playing</b></a>
                </li>
                {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Genre
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">action</a></li>
                    <li><a class="dropdown-item" href="#">comedi</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">anime</a></li>
                  </ul>
                </li> --}}
                <!-- <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li> -->
              </ul>
              <form class="d-flex justify-content-end" role="search" action="/search" method="post">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
              </form>
            </div>
          </div>
      </nav>
    </div>
    <div style="height: 100px;"></div>
             <!-- --------------------------------------- -->
    @yield('content')
<script>
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-85px";
    }
    prevScrollpos = currentScrollPos;
  }
</script>
  </body>
</html>