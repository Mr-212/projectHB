<?php

namespace App\Http\Livewire\Client\Tables;

use App\Constants\PropertyStatusConstant;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use App\Models\Client;


class ClientsTable extends LivewireDatatable
{


//    public $afterTableSlot = 'components.selected';
//    public $hideable = 'select';
    public function builder()
    {

        return Client::query()->Active();
    }

    public function columns()
    {
        return [
            Column::callback(['id'], function ($id) {
                return view('livewire.client.tables.actions.editindex', ['client_id' => $id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            
            Column::name('applicant_name')
            ->label('Applicant Name'),

            Column::name('applicant_email')
            ->label('Applicant Email'),

            Column::name('applicant_phone')
            ->label('Applicant Phone'),

            Column::name('co_applicant_name')
            ->label('Co Applicant Name'),

            Column::name('co_applicant_email')
            ->label('Co Applicant Email'),

            Column::name('co_applicant_phone')
            ->label('Co Applicant Phone'),

            Column::name('partner_name')
            ->label('Partner Name'),

            Column::name('partner_email')
            ->label('Partner Email'),

            Column::name('partner_phone')
            ->label('Partner Phone'),

            

        ];
    }

}
