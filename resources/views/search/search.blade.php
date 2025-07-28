@extends('include.app')
@section('content')
@php
  $api_search = "https://api.themoviedb.org/3/search/movie?api_key=921603c9656f3a7bf26b9d0ac83d63d1&query=$search&page=$page ";
  $file_search = file_get_contents($api_search);
  $json_search = json_decode($file_search,true);
@endphp
<div class="container" >
    <div class="mb-4" style="border-radius:13px; background: linear-gradient(90deg, rgb(199, 13, 13) 25%, rgba(144,1,1,0) 100%);width:100% ">
      <h4 style="color: white; padding:10px 10px;" > <i class="fa-solid fa-magnifying-glass"></i> Search for '{{ $search }}'
      <span style="float: right;color:white">Found : {{ $json_search['total_results'] }}</span>
      </h4>
    </div>
  </div>
  <div class="container">
    <div class="row">
      {{-- <div class="col-12"> --}}
        <?php 
          foreach($json_search['results'] as $row){
            ?>
            <div class="col-6 col-md-3 mb-4">
              <a href="">
                <div class="card text-bg-dark" style="max-width: 18rem;" >
                  <img src="https://image.tmdb.org/t/p/w500/<?= $row['poster_path']?>" style="height:400px;" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?= substr($row['title'],0,18)?><?php if(strlen($row['title']) >= 18){echo"...";}?></h5>
                      <p class="card-text"><?= $row['release_date'] ?></p>
                      {{-- <a href="detail/<?= $row['id'] ?>" class="btn btn-success">View</a> --}}
                    </div>
                </div>
              </a>
            </div>
          <?php } ?>
          @if ($json_search['total_results'] == null)
              <h1>kosong</h1>
          @endif
      {{-- </div>x --}}
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
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="icon"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15.75 19.5L8.25 12l7.5-7.5"
            />
          </svg>
        </a >
      {{-- Mundur 1 langkah --}}
    {{-- Kiri --}}

    {{-- Tengah --}}
      <div class="link-container">
        @if ($page != 1)
          <a href="/search?search={{ $search }}&page=1" class="page--link {{ $page == 1 ? 'page--link--current' : ''}}">1</a>     
        @endif
        @if ($page >= 5)
          <span>...</span>
        @endif
        @for ($i = $page; $i < $page + 2; $i++)
          @if ($i - 2 >= 1 && $i - 2 != 1) 
            <a href="/search?search={{ $search }}&page={{ $i-2 }}" class="page--link">{{ $i-2 }}</a> 
          @endif
        @endfor 
        <a href="/search?search={{ $search }}&page={{ $page }}" class="page--link page--link--current">{{ $page }}</a>
        @for ($i = $page + 1; $i < $page + 3; $i++)
          @if ($i <= $json_search['total_pages'] && $i != $json_search['total_pages'])
            <a href="/search?search={{ $search }}&page={{ $i }}" class="page--link">{{ $i }}</a> 
          @endif
        @endfor 
        @if ($page <= $json_search['total_pages'] - 4)
          <span>...</span>
        @endif
          @if ($page != $json_search['total_pages'])  
            <a href="/search?search={{ $search }}&page={{ $json_search['total_pages'] }}" class="page--link {{ $page == $json_search['total_pages'] ? 'page--link--current' : ''}}">{{$json_search['total_pages']}}</a>
          @endif
      </div>
    {{-- Tengah --}}

    {{-- Kanan --}}
        {{-- Maju 5 langkah --}}
          <a href="/search?search={{ $search }}&page={{ $page + 1 }}" class="btn-page">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="icon"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M8.25 4.5l7.5 7.5-7.5 7.5"
              />
            </svg>
          </a>
        {{-- Maju 5 langkah --}}

        {{-- Maju 1 langkah --}}
          <a href="/search?search={{ $search }}&page={{ $page >= $json_search['total_pages'] - 6 ? $json_search['total_pages'] : $page + 5 }}" class="page--link">
            <i class="fa-solid fa-angles-right" style="color: white"></i>
          </a>
        {{-- Maju 1 langkah --}}
    {{-- Kanan --}}
  </div>
</div>
@endsection