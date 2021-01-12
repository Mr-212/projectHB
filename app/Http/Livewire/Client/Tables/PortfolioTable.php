<?php

namespace App\Http\Livewire\Client\Tables;

use App\Constants\PropertyStatusConstant;
use App\Models\Property;
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

        return Property::Portfolio();
    }

    public function columns()
    {
        return [
//            Column::checkbox(),
            Column::callback(['id'], function ($id) {
                return view('livewire.property.tables.portfolio.action-index', ['property_id' => $id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),

            Column::callback('property_status_id',function($property_status_id){
                return PropertyStatusConstant::getValueByKey($property_status_id);
            })->label('Stage'),




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


            Column::callback(['id','purchase_price'],function ($property_id, $purchase_price){
                return view('livewire.property.tables.portfolio.action-purchase-price',compact('property_id','purchase_price'));

            })->label('Purchase Price'),

            Column::name('closing_date')
                ->label('Closing Date'),

            Column::name('due_diligence_expire_date')
                ->label('Due Diligence Expire'),

            Column::name('client.applicant_name')
                ->label('Applicant Name'),

            Column::name('client.applicant_email')
                ->filterable(),
//            Column::callback(['updated_by'], function ($updated_by) {
//                return User::getUserNameByID($updated_by);
//            })->label('Updated By'),




//            Column::name('client.additional_tenant_name')
//                ->label('Co applicant Phone'),
//
//            Column::callback(['client.welcome_payment'], function ($welcome_down_payment_id) {
//                return YesNoDropdown::getValueByKey($welcome_down_payment_id);
//            })->label('Welcome Payment'),
//
//            Column::callback(['client.mortgage_type_id'], function ($mortgage_type_id) {
//                return MortgageTypeDropdown::getValueByKey($mortgage_type_id);
//            })->label('Mortgage TYpe'),
//
//
//            Column::callback(['client.rental_verification_checked'], function ($rental_verification_check) {
//                return YesNoDropdown::getValueByKey($rental_verification_check);
//            })->label('Rental Verification Check'),
//
//            Column::name('new_construction_builder')
//                ->label('Builder Name'),
//
//            Column::name('purchase_price')
//                ->label('Purchase Price'),
//
//            Column::name('closing_cost')
//                ->label('Closing Cost'),

//            Column::name('closing_credit_general')
//                ->label('Closing Credit General'),
//
//            Column::callback(['hoa_check'], function ($hoa_check) {
//                return YesNoDropdown::getValueByKey($hoa_check);
//            })->label('HOA?'),
//
//            Column::name('hoa_name')
//                ->label('HOA Name'),
//
//            Column::name('hoa_phone')
//                ->label('HOA PHone'),
//
//            Column::name('pre_closing.rent')
//                ->label('Rent'),
//
//            Column::name('pre_closing.payment_option_3_month')
//                ->label('3 Month Option'),
//
//            Column::name('pre_closing.payment_option_6_month')
//                ->label('6 Month Option'),
//
//            Column::name('pre_closing.payment_option_12_month')
//                ->label('12 Month Option'),
//
//            Column::name('pre_closing.payment_option_date')
//                ->label('Option Payment Date'),
//
//            Column::name('pre_closing.inspection_checked')
//                ->label('Inspection Check'),
//
//            Column::name('pre_closing.appraisal_value')
//                ->label('Appraisal Value'),
//
//            Column::name('pre_closing.renter_insurance_name')
//                ->label('Renter Insurance'),
//
//            Column::name('pre_closing.warranty_company_name')
//                ->label('Warranty Company'),
//
//            Column::callback(['pre_closing.warranty_paid_by_seller_checked'], function ($warranty_paid_by_seller_check) {
//                return YesNoDropdown::getValueByKey($warranty_paid_by_seller_check);
//            })->label('Warranty Paid By Seller'),
//
//            Column::name('pre_closing.lease_expire_date')
//                ->label('Lease Expire'),


        ];
    }



//    public function render()
//    {
//        return view('livewire.portfolio')->extends('layouts.app');
//    }
}
