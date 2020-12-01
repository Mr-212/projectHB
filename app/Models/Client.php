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
        'welcome_down_payment_complete_check',
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
        'additional_tenant',

        'due_diligence_rent',
        'due_diligence_option_payment',
        'due_diligence_option_payment_3_month',
        'due_diligence_option_payment_6_month',
        'due_diligence_option_payment_12_month',
        'due_diligence_option_payment_date',
        'due_diligence_inspection_check',
        'due_diligence_inspection_check_date',



        'created_by',
        'updated_by',
        'deleted_by',
        ];

    protected $casts = [
        'additional_tenant' => 'array',
        'property_closing_date' =>'date:Y-m-d',
        'property_due_diligence_expire' =>'date:Y-m-d',
        'due_diligence_inspection_check_date' =>'date:Y-m-d',
    ];
    protected $attributes = [
//        'additional_tenant' => [
//            "is_completed",
//            "created_by",
//            "comment"
//        ],

//        'additional_tenant' => '{
//            "theme": "minimalist",
//            "comment": "light"
//        }'
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

    public function last_updated_by()
    {
        return $this->hasOne(User::class,'updated_by','id');
    }
}
