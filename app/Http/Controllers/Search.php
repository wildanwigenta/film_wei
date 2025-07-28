<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Search extends Controller
{
    public function index(){
        $data['navbar'] = "null";
        $data['search'] = request()->search;
        $data['page'] = request()->page == null ? 1 : request()->page;
            if(request()->search == null){
                return redirect()->to('/');
            }
            // return redirect()->to('/search'.'/'.$data['search'].'/'.$data['page']);
        
        return view('search/search',$data);
    }
}
