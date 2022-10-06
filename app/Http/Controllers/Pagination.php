<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pagination extends Controller
{
    public function popular($page = ''){
        $data['navbar'] = "popular";
        $data['page'] = $page == null ? 1 : $page;
        return view('popular',$data);
    }

    public function top_rated($page = ''){
        $data['navbar'] = "top_rated";
        $data['page'] = $page == null ? 1 : $page;
        return view('top_rated',$data);
    }

    public function now_playing($page = ''){
        $data['navbar'] = "now_playing";
        $data['page'] = $page == null ? 1 : $page;
        return view('now_playing',$data);
    }
}
