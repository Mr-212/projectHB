<?php

namespace App\Http\Livewire\Client\Tables;

use App\Constants\StageConstant;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use App\Models\Client;
use App\Models\User;
use App\Constants\Dropdowns\YesNoDropdown;
use App\Constants\Dropdowns\MortgageTypeDropdown;


class PortfolioTable extends LivewireDatatable
{
    public function builder()
    {

        return Client::with('property','pre_closing')->portfolio();
    }

    public function columns()
    {
        return [
//            Column::checkbox(),
            Column::callback(['id'], function ($id) {
                return view('livewire.client.tables.actions.outstanding-items-before-dd-actions', ['id' => $id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),

            Column::callback('stage',function($stage){
                return StageConstant::getValueByKey($stage);
            })->label('Stage'),

            Column::name('property.closing_date')
                ->label('Closing Date'),

            Column::name('property.due_diligence_expire_date')
                ->label('Due Diligence Expire'),


            Column::callback(['updated_by'], function ($updated_by) {
                return User::getUserNameByID($updated_by);
            })->label('Updated By'),

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

            Column::callback(['welcome_down_payment'], function ($welcome_down_payment_id) {
                return YesNoDropdown::getValueByKey($welcome_down_payment_id);
            })->label('Welcome Payment'),

            Column::callback(['mortgage_type_id'], function ($mortgage_type_id) {
                return MortgageTypeDropdown::getValueByKey($mortgage_type_id);
            })->label('Mortgage TYpe'),


            Column::callback(['rental_verification_check'], function ($rental_verification_check) {
                return YesNoDropdown::getValueByKey($rental_verification_check);
            })->label('Rental Verification Check'),

            Column::name('property.new_construction_builder')
                ->label('Builder Name'),

            Column::name('property.purchase_price')
                ->label('Purchase Price'),

            Column::name('property.closing_cost')
                ->label('Closing Cost'),

            Column::name('property.closing_credit_general')
                ->label('Closing Credit General'),

            Column::callback(['property.hoa_check'], function ($hoa_check) {
                return YesNoDropdown::getValueByKey($hoa_check);
            })->label('HOA?'),

            Column::name('property.hoa_name')
                ->label('HOA Name'),

            Column::name('property.hoa_phone')
                ->label('HOA PHone'),

            Column::name('pre_closing.rent')
                ->label('Rent'),

            Column::name('pre_closing.payment_option_3_month')
                ->label('3 Month Option'),

            Column::name('pre_closing.payment_option_6_month')
                ->label('6 Month Option'),

            Column::name('pre_closing.payment_option_12_month')
                ->label('12 Month Option'),

            Column::name('pre_closing.payment_option_date')
                ->label('Option Payment Date'),

            Column::name('pre_closing.inspection_checked')
                ->label('Inspection Check'),

            Column::name('pre_closing.appraisal_value')
                ->label('Appraisal Value'),

            Column::name('pre_closing.renter_insurance_name')
                ->label('Renter Insurance'),

            Column::name('pre_closing.warranty_company_name')
                ->label('Warranty Company'),

            Column::callback(['pre_closing.warranty_paid_by_seller_checked'], function ($warranty_paid_by_seller_check) {
                return YesNoDropdown::getValueByKey($warranty_paid_by_seller_check);
            })->label('Warranty Paid By Seller'),

            Column::name('pre_closing.lease_expire_date')
                ->label('Lease Expire'),


        ];
    }



//    public function render()
//    {
//        return view('livewire.portfolio')->extends('layouts.app');
//    }
}
