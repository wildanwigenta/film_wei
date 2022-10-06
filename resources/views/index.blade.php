@extends('include.app')
@section('content')
<div class="container">
  <div class="mb-4" style="border-radius:13px; background: linear-gradient(90deg, rgb(199, 13, 13) 25%, rgba(144,1,1,0) 100%);width:35% ">
    <h4 style="color: white; padding:10px 10px;" >Popular</h4>
  </div>
</div>
<div class="container d-flex">
  <div class="row justify-content-center ">
    @php
        $api_popular = "https://api.themoviedb.org/3/movie/popular?api_key=921603c9656f3a7bf26b9d0ac83d63d1";
        $file_popular = file_get_contents($api_popular);
        $json_popular = json_decode($file_popular,true);
    @endphp 
        
        @foreach($json_popular['results'] as $row)
    
    <div class="col-6 col-md-3 mb-4">
    <a href="">
      <div class="card text-bg-dark" style="max-width: 18rem;" >
        <img src="https://image.tmdb.org/t/p/w500/{{ $row['poster_path']}}" style="height:400px;" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ substr($row['title'],0,18) }}<?php if(strlen($row['title']) >= 18){echo"...";}?></h5>
          <p class="card-text">{{ $row['release_date'] }} </p>
          {{-- <a href="detail/{{ $row['id'] }}  ?>" class="btn btn-success">View</a> --}}
        </div>
      </div>
    </a>
    </div>
          @endforeach
  </div>
</div>
          <!-- --------------------------------------- -->

<div class="container" style="margin-top: 60px;">
  <div class="mb-4" style="border-radius:13px; background: linear-gradient(90deg, rgb(199, 13, 13) 25%, rgba(144,1,1,0) 100%);width:35% ">
    <h4 style="color: white; padding:10px 10px;" >Top Rated</h4>
  </div>
</div>
<div class="container d-flex ">
  <div class="row justify-content-center ">
    <?php 
        $api_toprated = "https://api.themoviedb.org/3/movie/top_rated?api_key=921603c9656f3a7bf26b9d0ac83d63d1";
        $file_toprated = file_get_contents($api_toprated);
        $json_toprated = json_decode($file_toprated,true);
        
        foreach($json_toprated['results'] as $row){
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
  </div>
</div>
           <!-- --------------------------------------- -->
           
<div class="container" style="margin-top: 60px;">
  <div class="mb-4" style="border-radius:13px; background: linear-gradient(90deg, rgb(199, 13, 13) 25%, rgba(144,1,1,0) 100%);width:35% ">
    <h4 style="color: white; padding:10px 10px;" >Now Playing</h4>
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
  </div>
</div>
@endsection