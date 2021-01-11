<?php

namespace App\Http\Controllers\Client;
use App\Constants\ClientStatusConstant;
use App\Constants\PropertyStatusConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function portfolio(){

        return view('client.portfolio');
    }

    public function get_cancelled_house(Request $request){

        $type = PropertyStatusConstant::HOUSE_CANCELLED;
        return view('client.house.house',compact('type'));

    }
    public function get_dropout_client(Request $request){

        $type = ClientStatusConstant::CLIENT_DROPOUT;
        return view('client.house.house',compact('type'));

    }

    public function get_move_out_house(Request $request){

        $type = PropertyStatusConstant::HOUSE_EVICTED;
        return view('client.house.house',compact('type'));

    }

    public function get_evicted_house(Request $request){

        $type = ClientStatusConstant::CLIENT_DROPOUT;
        return view('client.house.house',compact('type'));

    }

    public function get_vacant_house(Request $request){

        $type = PropertyStatusConstant::HOUSE_VACANT;
        return view('client.house.house',compact('type'));

    }
    public function get_sold_house(Request $request){

        $type = PropertyStatusConstant::HOUSE_SOLD;
        return view('client.house.house',compact('type'));

    }
}
