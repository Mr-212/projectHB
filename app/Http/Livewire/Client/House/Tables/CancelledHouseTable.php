<?php

namespace App\Http\Livewire\Client\House\Tables;

use App\Models\Client;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Constants\PropertyStatusConstant;

class CancelledHouseTable extends LivewireDatatable
{
//    public $model = Client::class;

    public function builder()
    {
        return Client::with('property')->CancelledHouse();
    }

    public function columns()
    {
        return [
            Column::callback(['id'], function ($id) {
                return view('livewire.client.tables.house.cancelled.index', ['client_id' => $id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('id')
                ->label('ID'),

            Column::callback('property.property_status_id',function($stage){
                return PropertyStatusConstant::getValueByKey($stage);
            })->label('Stage'),

            Column::callback(['additional_tenant_name','id','property.id'], function ($additional_tenant_name,$client_id,$property_id) {
                return view('livewire.client.tables.house.cancelled.action-additional-tenant',
                    ['client_id' => $client_id,
                        'property_id'=> $property_id,
                        'additional_tenant_name'=> $additional_tenant_name,
                    ]);
            })->label('Additional Tenant'),

            Column::name('property.house_number_and_street')
                ->label('House Address')
                ->filterable(),

            Column::name('property.city')
                ->label('City')
                ->filterable(),

            Column::name('property.state')
                ->label('State'),

            Column::name('property.county')
                ->label('County'),

            Column::name('property.zip')
                ->label('Zip'),

//            Column::name('partner_phone')
//                ->label('Partner Phone'),
//
//            Column::name('co_applicant_name')
//                ->label('Co applicant Name'),
//
//            Column::name('co_applicant_email')
//                ->label('Co applicant Email'),


        ];
    }

}