<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PropertyAndChecklistImport;
use App\Models\Property;
use App\Models\PreClosingChecklist;
use App\Models\Client;


class ImportController extends Controller
{

    public function importPropertyAndChecklist(){
        $file = public_path('/upload/imports/dream-portfolio.xlsx');
//        if(file_exists($file)) {
//                    PreClosingChecklist::truncate();
//                    Property::truncate();
//                    Client::truncate();
//            $data = Excel::import(new PropertyAndChecklistImport(),$file);
//          //  dd($data);
//            dd('In import controller');
//        }
    }
}
