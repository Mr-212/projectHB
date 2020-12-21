<?php

namespace App\Http\Controllers\Client;
use App\Constants\StageConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function portfolio(){

        return view('client.portfolio');
    }

    public function get_cancelled_house(Request $request){

        $type = StageConstant::HOUSE_CANCELLED;
        return view('client.house.house',compact('type'));

    }
    public function get_dropout_client(Request $request){

        $type = StageConstant::DROPOUT_CLIENT;
        return view('client.house.house',compact('type'));

    }
}
