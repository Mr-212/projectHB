<?php

namespace App\Http\Livewire;

use App\Constants\Dropdowns\MortgageTypeDropdown;
use App\Models\Client;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;

class OutstandingItemsBeforeExpireTable extends LivewireDatatable
{

    public function builder()
    {
        return Client::query()->beforeDDExpire();
    }

    public function columns()
    {
        return [
//            Column::checkbox(),
            Column::callback(['id'], function ($id) {
                return view('livewire.tables.actions.outstanding-items-before-dd-actions', ['id' => $id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('id')
                ->label('ID'),
            Column::name('property_closing_date')
                ->label('Closing Date'),

            Column::name('property_due_diligence_expire')
                ->label('Due Diligence Expire'),

            Column::name('updated_by')
                ->label('Updated By'),

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

//            Column::name('co_applicant_name')
//                ->label('Co applicant Name'),
//
//            Column::name('co_applicant_email')
//                ->label('Co applicant Email'),
//
//            Column::name('co_applicant_phone')
//                ->label('Co applicant Phone'),

            Column::name('additional_tenant_name')
                ->label('Co applicant Phone'),

            Column::name('welcome_down_payment')
                ->label('Welcome Down Payment'),

            Column::callback(['mortgage_type_id'], function ($mortgage_type_id) {
                return MortgageTypeDropdown::getKey($mortgage_type_id);
            })->label('Mortgage TYpe'),


            Column::name('rental_verification_check')
                ->label('Rental Verification Check'),

            Column::name('property_new_construction_builder_name')
                ->label('Builder Name'),




        ];
    }
}