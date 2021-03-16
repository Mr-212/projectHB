<?php

namespace App\Http\Livewire\Client\House\Tables;

use App\Constants\ClientStatusConstant;
use App\Models\Client;
use App\Models\Property;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Constants\PropertyStatusConstant;

class EvictedHouseTable extends LivewireDatatable
{

    protected $listeners = [];
//     public $model = Client::class;

    public function mount($model = null, $include = [], $exclude = [], $hide = [], $dates = [], $times = [], $searchable = [], $sort = null, $hideHeader = null, $hidePagination = null, $perPage = 10, $exportable = false, $hideable = false, $beforeTableSlot = false, $afterTableSlot = false, $params = [])
    {
        parent::mount($model, $include, $exclude, $hide, $dates, $times, $searchable, $sort, $hideHeader, $hidePagination, $perPage, $exportable, $hideable, $beforeTableSlot, $afterTableSlot, $params); // TODO: Change the autogenerated stub
    }

    public function hydrate(){

    }

    public function builder()
    {
        return Property::with('client')->HouseEvicted();
    }

    public function columns()
    {
        return [
            Column::callback(['id','property_status_id'], function ($id) {
                return view('livewire.property.tables.evicted.action-index', ['property_id' => $id]);
            }),

//            NumberColumn::name('id')
//                ->defaultSort('desc')
//                ->label('ID'),

            Column::callback('property_status_id',function($stage){
                return PropertyStatusConstant::getValueByKey($stage);
            })->label('Status'),


            Column::name('move_out_date')
                ->label('Move Out Date'),

            Column::name('client.applicant_name')
                ->label('Applicant'),


            Column::name('client.applicant_email')
                ->label('Applicant  Email'),



            Column::name('house_number_and_street')
                ->label('House Address')
                ->filterable(),


            Column::name('city')
                ->label('City')
                ->filterable(),

            Column::name('state')
                ->label('State'),

            Column::name('county')
                ->label('County'),

            Column::name('zip')
                ->label('Zip'),



        ];
    }


}