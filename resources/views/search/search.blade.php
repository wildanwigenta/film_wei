@extends('include.app')
@section('content')
<div class="container" >
    <div class="mb-4" style="border-radius:13px; background: linear-gradient(90deg, rgb(199, 13, 13) 25%, rgba(144,1,1,0) 100%);width:35% ">
      <h4 style="color: white; padding:10px 10px;" > <i class="fa-solid fa-magnifying-glass"></i> Search for '{{ $search }}'</h4>
    </div>
  </div>
  <div class="container d-flex ">
    <div class="row justify-content-start ">
      <?php 
          $api_search = "https://api.themoviedb.org/3/search/movie?api_key=921603c9656f3a7bf26b9d0ac83d63d1&query={{ $search }}";
          $file_search = file_get_contents($api_search);
          $json_search = json_decode($file_search,true);
          
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
    </div>
  </div>
@endsection