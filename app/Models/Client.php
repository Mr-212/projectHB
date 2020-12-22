<?php

namespace App\Models;

use App\Constants\StageConstant;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{

    use HasFactory;
//    protected $dateFormat = 'Y-m-d';
    protected $fillable = [

        'applicant_name',
        'applicant_email' ,
        'applicant_phone',
        'partner_name' ,
        'partner_email' ,
        'partner_phone',
        'co_applicant_name',
        'co_applicant_email',
        'co_applicant_phone' ,

        'additional_tenant_check' ,
        'additional_tenant_name' ,
        'mortgage_type_id' ,
        'rental_verification_complete_check',
        'rental_verification_check',
        'welcome_down_payment',
        'welcome_down_payment_complete_check',

        'property_new_construction_check',
        "property_new_construction_builder_name",
        "property_country" ,
        "property_state" ,
        "property_city" ,
        "property_zip",

        "property_purchase_price" ,
        "property_closing_cost" ,
        "property_closing_credit_general" ,
        "property_annual_property_tax" ,

        "property_hoa_check" ,
        "property_hoa_name" ,
        "property_hoa_phone" ,

        "property_repair_request_check" ,
        "property_repair_request_item_names" ,

        "property_lender_check" ,
        "property_lender_name" ,

        "property_closing_date_complete_check" ,
        "property_closing_date" ,

        "property_due_diligence_expire_complete_check" ,
        "property_due_diligence_expire" ,

        "due_diligence_rent" ,
        "due_diligence_option_payment_check" ,
        "due_diligence_option_payment_3_month" ,
        "due_diligence_option_payment_6_month" ,
        "due_diligence_option_payment_12_month" ,
        "due_diligence_option_payment_date" ,

        "letter_of_commitment_signed" ,
        "on_boarding_fee_payment_check" ,



        "due_diligence_inspection_check" ,
        "due_diligence_inspection_check_date" ,

        'appraisal_value_check' ,
        'appraisal_value' ,

        'driver_license_applicant' ,
        'driver_license_co_applicant' ,
        'soc_sec_card_applicant' ,
        'soc_sec_card_co_applicant' ,

        'renter_insurance_check' ,
        'renter_insurance_company_name' ,

        'flood_certificate_check' ,
        'landlord_insurance_check' ,

        'warranty_check' ,
        'warranty_company_name' ,

        'warranty_paid_by_seller_check' ,

        'lease_check' ,
        'lease_expire_date' ,

        'termite_check' ,
        'termite_paid_by' ,

        'septic_inspection_check' ,
        'clear_now_rent_payment_enrollment_check' ,
        'prorated_rent_check' ,
        'prorated_rent' ,
        'other_check' ,
        'other_value' ,
        'stage',

        'created_by',
        'updated_by',
        'deleted_by',
        ];

    protected $guarded = ['id'];

    protected $casts = [
//        'additional_tenant' => 'array',
//        'property_closing_date' =>'datetime:Y-m-d',
//        'property_due_diligence_expire' =>'datetime:Y-m-d H:i:s',
//        'due_diligence_inspection_check_date' =>'datetime:Y-m-d',
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
//    'property_due_diligence_expire' =>'date:Y-m-d'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->created_by = Auth::id();
        });
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

    public function scopePortfolio($query){
        return $query->where('stage', StageConstant::HOUSE_BOOKED);
//            ->orderBy('updated_at','desc');
    }
    public function scopeCancelledHouse($query){
        return $query->where('stage', StageConstant::HOUSE_CANCELLED);
//            ->orderBy('updated_at','desc');
    }
    public function scopeDropoutClient($query){
        return $query->where('stage', StageConstant::DROPOUT_CLIENT);
//            ->orderBy('updated_at','desc');
    }

    public function last_updated_by()
    {
        return $this->hasOne(User::class,'updated_by','id');
    }

    public function getPaymentOptionList(){
        return ClientItemCheckListVariables::getPaymentOptionList();
    }
}
