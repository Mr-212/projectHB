<?php

namespace App\Http\Livewire\User;

use App\Constants\ClientStatusConstant;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Constants\PropertyStatusConstant;
use App\Models\User;

class UserTable extends LivewireDatatable
{
//    public $model = Client::class;

    public function builder()
    {
        return User::where('id','!=',auth()->id());

    }


    public function columns()
    {
        return [

            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),

            NumberColumn::name('is_active')
                ->label('Is Active'),


//            Column::callback('status',function($stage){
//                return ClientStatusConstant::getValueByKey($stage);
//            })->label('Stage'),

            Column::name('name')
                ->label('Name')
                ->filterable(),

            Column::name('email')
                ->filterable(),

        ];
    }

}