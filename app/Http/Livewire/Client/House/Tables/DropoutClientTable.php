<?php

namespace App\Http\Livewire\Client\House\Tables;

use App\Constants\ClientStatusConstant;
use App\Models\Client;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Constants\PropertyStatusConstant;

class DropoutClientTable extends LivewireDatatable
{
//    public $model = Client::class;

    public function builder()
    {
        return Client::query()->DropoutClient()->DropoutProperty()->groupBy('clients.id');


//            Client::query()->leftJoin('properties as property','clients.id','property.client_id')
//            ->where('clients.status',ClientStatusConstant::CLIENT_DROPOUT)
//            ->where('properties.property_status_id',PropertyStatusConstant::CLIENT_DROPOUT)
//            ->groupBy('clients.id');
    }

//    public function getPropertyProperty()
//    {
//        return Property::DropoutClient();
//    }

    public function columns()
    {
        return [
            Column::callback(['id','property.id'], function ($id, $property_id) {
                return view('livewire.client.tables.house.dropout.action-index', ['client_id' => $id,'property_id' => $property_id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),

            NumberColumn::name('property.id')
                ->label('Property'),


            Column::callback('status',function($stage){
                return ClientStatusConstant::getValueByKey($stage);
            })->label('Stage'),

            Column::name('applicant_name')
                ->label('Applicant Name')
                ->filterable(),

            Column::name('applicant_email')
                ->filterable(),

            Column::name('applicant_phone')
                ->label('Applicant Phone'),

            Column::name('partner_name')
                ->label('Partner Name'),

            Column::name('partner_email')
                ->label('Partner Email'),

            Column::name('partner_phone')
                ->label('Partner Phone'),

            Column::name('co_applicant_name')
                ->label('Co applicant Name'),

            Column::name('co_applicant_email')
                ->label('Co applicant Email'),


        ];
    }

}