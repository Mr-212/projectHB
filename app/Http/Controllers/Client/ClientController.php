<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function portfolio(){
//        dd('here');
        return view('client.portfolio');
    }

    public function get_house_by_type(Request $request){
//        dd($request->all());

        return view('client.house.house');

    }
}
