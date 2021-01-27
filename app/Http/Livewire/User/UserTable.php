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


    public $hideable = 'select';
    public $is_checked;





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

//            Column::checkbox('is_active'),
////            NumberColumn::name('is_active')
//                ->label('Is Active'),


            Column::callback(['is_active','id'],function($is_active, $id){
                return view('user.user-is-active',compact('is_active','id'));
            })->label('Active'),

            Column::name('name')
                ->label('Name')
                ->filterable(),

            Column::name('email')
                ->filterable(),

        ];
    }

    public function is_active($id,$is_active){
        User::where('id',$id)->update(['is_active' => $is_active]);
    }



}