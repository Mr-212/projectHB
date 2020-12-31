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

class VacantHouseTable extends LivewireDatatable
{
//    public $model = Client::class;

    public function builder()
    {
        return Property::HouseVacant();
    }

    public function columns()
    {
        return [
//            Column::callback(['id'], function ($id) {
//                return view('livewire.client.tables.actions.outstanding-items-before-dd-actions', ['client_id' => $id]);
//            }),

            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),

            Column::callback('property_status_id',function($stage){
                return PropertyStatusConstant::getValueByKey($stage);
            })->label('Status'),


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