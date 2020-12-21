<?php

namespace App\Http\Livewire\Client\House\Tables;

use App\Models\Client;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Constants\StageConstant;

class DropoutClientTable extends LivewireDatatable
{
//    public $model = Client::class;

    public function builder()
    {
        return Client::query()->DropoutClient();
    }

    public function columns()
    {
        return [
            Column::callback(['id'], function ($id) {
                return view('livewire.client.tables.actions.outstanding-items-before-dd-actions', ['id' => $id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('id')
                ->label('ID'),

            Column::callback('stage',function($stage){
                return StageConstant::getValueByKey($stage);
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