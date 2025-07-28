@extends('include.app')
@section('content')
    <div class="container">
        <div class="mb-4"
            style="border-radius:13px; background: linear-gradient(90deg, rgb(199, 13, 13) 25%, rgba(144,1,1,0) 100%);width:35% ">
            <h4 style="color: white; padding:10px 10px;">Now Playing</h4>
        </div>
    </div>
    <div class="container d-flex ">
        <div class="row justify-content-center ">
            <?php 
          $api_nowplaying = "https://api.themoviedb.org/3/movie/now_playing?api_key=921603c9656f3a7bf26b9d0ac83d63d1";
          $file_nowplaying = file_get_contents($api_nowplaying);
          $json_nowplaying = json_decode($file_nowplaying,true);
          
          foreach($json_nowplaying['results'] as $row){
      ?>
            <div class="col-6 col-md-3 mb-4">
                <a href="">
                    <div class="card text-bg-dark" style="max-width: 18rem;">
                        <img src="https://image.tmdb.org/t/p/w500/<?= $row['poster_path'] ?>" style="height:400px;"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= substr($row['title'], 0, 18) ?><?php if (strlen($row['title']) >= 18) {
                                echo '...';
                            } ?></h5>
                            <p class="card-text"><?= $row['release_date'] ?></p>
                            {{-- <a href="detail/<?= $row['id'] ?>" class="btn btn-success">View</a> --}}
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="container-page">
        {{-- Kiri --}}
        {{-- Mundur 5 langkah --}}
        <a href="/now_playing/{{ $page <= 6 ? 1 : $page - 5 }}" class="page--link">
            <i class="fa-solid fa-angles-left" style="color: white"></i>
        </a>
        {{-- Mundur 5 langkah --}}

        {{-- Mundur 1 langkah --}}
        <a href="/now_playing/{{ $page == 1 ? 1 : $page - 1 }}" class="btn-page">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </a>
        {{-- Mundur 1 langkah --}}
        {{-- Kiri --}}

        {{-- Tengah --}}
        <div class="link-container">
            @if ($page != 1)
                <a href="/now_playing/1" class="page--link {{ $page == 1 ? 'page--link--current' : '' }}">1</a>
            @endif
            @if ($page >= 5)
                <span>...</span>
            @endif
            @for ($i = $page; $i < $page + 2; $i++)
                @if ($i - 2 >= 1 && $i - 2 != 1)
                    <a href="/now_playing/{{ $i - 2 }}" class="page--link">{{ $i - 2 }}</a>
                @endif
            @endfor
            <a href="/now_playing/{{ $page }}" class="page--link page--link--current">{{ $page }}</a>
            @for ($i = $page + 1; $i < $page + 3; $i++)
                @if ($i <= 500 && $i != 500)
                    <a href="/now_playing/{{ $i }}" class="page--link">{{ $i }}</a>
                @endif
            @endfor
            @if ($page <= 496)
                <span>...</span>
            @endif
            @if ($page != 500)
                <a href="/now_playing/500" class="page--link {{ $page == 500 ? 'page--link--current' : '' }}">500</a>
            @endif
        </div>
        {{-- Tengah --}}

        {{-- Kanan --}}
        {{-- Maju 5 langkah --}}
        <a href="/now_playing/{{ $page + 1 }}" class="btn-page">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </a>
        {{-- Maju 5 langkah --}}

        {{-- Maju 1 langkah --}}
        <a href="/now_playing/{{ $page >= 494 ? 500 : $page + 5 }}" class="page--link">
            <i class="fa-solid fa-angles-right" style="color: white"></i>
        </a>
        {{-- Maju 1 langkah --}}
        {{-- Kanan --}}
    </div>
@endsection
