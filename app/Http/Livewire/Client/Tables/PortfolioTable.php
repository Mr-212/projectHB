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

        return Client::query()->portfolio();
    }

    public function columns()
    {
        return [
//            Column::checkbox(),
            Column::callback(['id'], function ($id) {
                return view('livewire.client.tables.actions.outstanding-items-before-dd-actions', ['id' => $id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('id')
                ->label('ID'),

            Column::callback('stage',function($stage){
                return StageConstant::getValueByKey($stage);
            })->label('Stage'),

            Column::name('property_closing_date')
                ->label('Closing Date'),

            Column::name('property_due_diligence_expire')
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

            Column::name('property_new_construction_builder_name')
                ->label('Builder Name'),

            Column::name('property_purchase_price')
                ->label('Purchase Price'),

            Column::name('property_closing_cost')
                ->label('Closing Cost'),

            Column::name('property_closing_credit_general')
                ->label('Closing Credit General'),

            Column::callback(['property_hoa_check'], function ($hoa_check) {
                return YesNoDropdown::getValueByKey($hoa_check);
            })->label('HOA?'),

            Column::name('property_hoa_name')
                ->label('HOA Name'),

            Column::name('property_hoa_phone')
                ->label('HOA PHone'),

            Column::name('due_diligence_rent')
                ->label('Rent'),

            Column::name('due_diligence_option_payment_3_month')
                ->label('3 Month Option'),

            Column::name('due_diligence_option_payment_6_month')
                ->label('6 Month Option'),

            Column::name('due_diligence_option_payment_12_month')
                ->label('12 Month Option'),

            Column::name('due_diligence_option_payment_date')
                ->label('Option Payment Date'),

            Column::name('due_diligence_inspection_check_date')
                ->label('Inspection Check'),

            Column::name('appraisal_value')
                ->label('Appraisal Value'),

            Column::name('renter_insurance_company_name')
                ->label('Renter Insurance'),

            Column::name('warranty_company_name')
                ->label('Warranty Company'),

            Column::callback(['warranty_paid_by_seller_check'], function ($warranty_paid_by_seller_check) {
                return YesNoDropdown::getValueByKey($warranty_paid_by_seller_check);
            })->label('Warranty Paid By Seller'),

            Column::name('lease_expire_date')
                ->label('Lease Expire'),

            Column::name('prorated_rent')
                ->label('Prorated Rent'),

        ];
    }



//    public function render()
//    {
//        return view('livewire.portfolio')->extends('layouts.app');
//    }
}
