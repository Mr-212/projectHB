<?php

namespace App\Models;

use App\Constants\Dropdowns\StageConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'partner_name',
        'partner_email',
        'partner_phone',
        'co_applicant_name',
        'co_applicant_email',
        'co_applicant_phone',
        'additional_tenant_check',
        'additional_tenant_name',
        'welcome_down_payment',
        'mortgage_type',
        'mortgage_type_id',
        'rental_verification_check',

        'property_new_construction_check',
        'property_new_construction_builder_name',
        'property_country',
        'property_state',
        'property_city',
        'property_zip',
        'property_purchase_price',
        'property_closing_cost',
        'property_closing_credit_general',
        'property_hoa_check',
        'property_hoa_name',
        'property_hoa_phone',
        'property_repair_request',
        'property_lender_check',
        'property_lender_name',
        'property_closing_date',
        'property_due_diligence_expire',

        'created_by',
        'updated_by',
        'deleted_by',
        ];


    public static function boot()
    {
        parent::boot();

//        self::creating(function (){
//            $this->created_by = Auth::id();
//        });
//
        self::updating(function ($model){
            $model->updated_by = Auth::id();
        });

    }

    public function scopeBeforeDD($query){
        return $query->where('stage', StageConstant::BEFORE_DUE_DILIGENCE);
    }

    public function scopeBeforeDDExpire($query){
        return $query->where('stage', StageConstant::BEFORE_DUE_DILIGENCE_EXPIRE);
    }
}
