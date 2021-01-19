<?php

namespace App\Http\Livewire\Client\Tables;

use App\Constants\ClientStatusConstant;
use App\Constants\Dropdowns\YesNoDropdown;
use App\Models\Client;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Constants\PropertyStatusConstant;

class OutstandingItemsBeforeDueDiligenceTable extends LivewireDatatable
{

    public function builder()
    {
        return Client::query()->with('property','pre_closing')->Active()->BeforeDDExpireQuery();

    }

    public function columns()
    {
        return [
//            Column::checkbox(),
            Column::callback(['id', 'property.id'], function ($id,$property_id) {
                return view('livewire.client.tables.actions.index', ['client_id' => $id,'property_id'=>$property_id]);
            }),

            NumberColumn::name('id')
                ->defaultSort('id')
                ->label('ID'),

            NumberColumn::name('property.id')
                ->label('property'),


            Column::callback('status',function($stage){
                return ClientStatusConstant::getValueByKey($stage);
            })->label('Client Status'),

            Column::name('applicant_name')
                ->label('Applicant Name')
                ->filterable(),

            Column::name('applicant_email')
                ->filterable(),


            Column::callback('pre_closing.welcome_payment_checked',function($field){
                if($field){
                    return view('livewire.property.tables.actions.check-icon');
               }
            })->label('Welcome Payment'),


             Column::callback('pre_closing.rental_verification_checked',function($field){
                 if($field){
                     return view('livewire.property.tables.actions.check-icon');
                 }
            })->label('Rental Verification'),

            Column::callback('pre_closing.letter_of_commitment_checked',function($field){
                if($field){
                    return view('livewire.property.tables.actions.check-icon');
                }
            })->label('Letter of Commitment'),

            Column::callback('pre_closing.on_boarding_fee_payment_checked',function($field){
                if($field){
                    return view('livewire.property.tables.actions.check-icon');
                }
            })->label('On Board Fee'),

            Column::callback('pre_closing.inspection_checked',function($field){
                if($field){
                    return view('livewire.property.tables.actions.check-icon');
                }
            })->label('Inspection'),

            Column::callback('pre_closing.appraisal_value_checked',function($field){
                if($field){
                    return view('livewire.property.tables.actions.check-icon');
                }
            })->label('Appraisal'),

            Column::callback('pre_closing.termite_checked',function($field){
                if($field){
                    return view('livewire.property.tables.actions.check-icon');
                }
            })->label('Termite'),

//            Column::name('rental_verification_checked')
//                ->label('Partner Name'),
//
//            Column::name('partner_email')
//                ->label('Partner Email'),
//
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