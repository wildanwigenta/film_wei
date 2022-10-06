<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Search extends Controller
{
    public function index(){
        $data['navbar'] = "null";
        $data['search'] = request()->search;
        if(request()->search == null){
            return redirect()->to('/');
        }
        return view('search/search',$data);
    }
}
