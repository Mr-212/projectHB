<?php

namespace App\Models;

use App\Constants\ClientStatusConstant;
use App\Constants\PropertyStatusConstant;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Client extends Model
{

    use HasFactory;
    protected $table =  'clients';
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
        'rental_verification_checked',
        'rental_verification_checked_at',
//        'rental_verification_check',
        'welcome_payment',
        'welcome_payment_checked',
        'welcome_payment_checked_at',

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
          'welcome_payment_checked_at' =>'date:Y-m-d',
          'rental_verification_checked_at' =>'date:Y-m-d',
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

    public function getIsClientDroppedAttribute(){
        return $this->status == ClientStatusConstant::CLIENT_DROPOUT ? TRUE : FALSE;
    }

    public function property(){
        return $this->belongsTo(Property::class,'id','client_id');
    }
//
//    public function property(){
//        return $this->belongsToMany(Property::class);
//    }

//    public function property($status_id = null){
//            $query = $this->belongsToMany(Property::class,'client_properties','client_id','property_id');
//            if($status_id)
//               $query->wherePivot('status_id',$status_id);
//           return $query;
//    }
//    public function property($status_id = null){
//            $query = $this->belongsToMany(Property::class);
//            if($status_id)
//               $query->wherePivot('status_id',$status_id);
//           return $query;
//    }
//    public function property($status_id = null){
//            $query = $this->belongsToMany(Property::class);
//            if($status_id)
//               $query->wherePivot('status_id',$status_id);
//           return $query;
//    }


//    public function property(){
//        return $this->belongsTo(Property::class,'id','client_id');
//    }
    public function pre_closing(){
        return $this->belongsTo(ClientPreClosingChecklist::class,'id','client_id');
    }

    public function scopeBeforeDD($query){
//        return $query->where('stage', PropertyStatusConstant::BEFORE_DUE_DILIGENCE);
//        return $query->whereHas('property', function (Builder $builder){
//            $builder->where('property_status_id', PropertyStatusConstant::BEFORE_DUE_DILIGENCE);
//        });

        return $query->whereHas('property', function (Builder $builder){
            $builder->where('property_status_id', null);
        });
    }

    public function scopeBeforeDDExpire($query){

        return $query->whereHas('property', function ($q){
            $q->where('property_status_id', PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE);
        });
    }

//    public function scopeBeforeDDExpire($query){
//
//        return $query->join('properties as property','clients.id','property.client_id')
//        ->where('property.property_status_id','=',PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE);
////        return $query->where('stage', PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE);
//    }

    public function scopeWithoutProperty($query){

        return $query->doesntHave('property');

//        return $query->where('stage', PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE);
    }

    public function scopePortfolio($query){

        return $query->whereHas('property', function (Builder $builder){
            $builder->where('property_status_id', PropertyStatusConstant::HOUSE_BOOKED);
        });
       // return $query->where('stage', PropertyStatusConstant::HOUSE_BOOKED);
    }
    public function scopeCancelledHouse($query){

        return $query->whereHas('property', function($builder){
            $builder->where('property_status_id', PropertyStatusConstant::HOUSE_CANCELLED);
        });

    }
    public function scopeDropoutClient($query){
        return $query->where('status', ClientStatusConstant::CLIENT_DROPOUT);
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
