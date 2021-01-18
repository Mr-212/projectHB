<?php

namespace App\Models;

use App\Constants\PropertyStatusConstant;
use App\Models\Casts\ItemCheckListDateTimeCast;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PreClosingChecklist extends Model
{

    protected $table = 'pre_closing_checklist';
    protected $fillable = [

        "client_id",
        "rent" ,
        "payment_option_3_month" ,
        "payment_option_6_month" ,
        "payment_option_12_month" ,

        "option_payment_date" ,
        "option_payment_date_checked" ,

        "letter_of_commitment_checked" ,
        "letter_of_commitment_checked_at" ,
        "letter_of_commitment_checked_by" ,

        "on_boarding_fee_payment_checked",
        "on_boarding_fee_payment_checked",
        "on_boarding_fee_payment_checked_at",
        "on_boarding_fee_payment_checked_comment",



        "inspection_checked" ,
        "inspection_checked_at" ,
        "inspection_checked_by" ,
        "inspection_checked_comment" ,
//        "inspection_check_date" ,
        'termite_checked' ,
        'termite_checked_by' ,
        'termite_checked_at' ,
        'termite_checked_comment' ,

        'termite_paid_by' ,

        'septic_inspection_checked',
        'septic_inspection_checked_at',
        'septic_inspection_checked_by',

//        'repair_credit_checked' ,
//        'repair_credit' ,

        'appraisal_value_checked' ,
        'appraisal_value_checked_at' ,
        'appraisal_value_checked_by' ,
        'appraisal_value' ,



        'driver_license_applicant_checked' ,
        'driver_license_applicant_checked_at' ,
        'driver_license_applicant_checked_by' ,

        'driver_license_co_applicant_checked' ,
        'driver_license_co_applicant_checked_at' ,
        'driver_license_co_applicant_checked_by' ,

        'soc_sec_card_applicant_checked' ,
        'soc_sec_card_applicant_checked_at' ,
        'soc_sec_card_applicant_checked_by' ,

        'soc_sec_card_co_applicant_checked' ,
        'soc_sec_card_co_applicant_checked_at' ,
        'soc_sec_card_co_applicant_checked_by' ,

        'renter_insurance_checked' ,
        'renter_insurance_checked_at' ,
        'renter_insurance_checked_by' ,
        'renter_insurance_name' ,

        'flood_certificate_checked' ,
        'flood_certificate_checked_at' ,
        'flood_certificate_checked_by' ,

        'landlord_insurance_checked' ,
        'landlord_insurance_checked_at' ,
        'landlord_insurance_checked_by' ,

        'warranty_checked' ,
        'warranty_checked_at' ,
        'warranty_checked_by' ,
        'warranty_company_name' ,
        'warranty_paid_by_seller_checked' ,


        'lease_signed_checked' ,
        'lease_signed_checked_at' ,
        'lease_signed_checked_by' ,

        'lease_expire_checked' ,
        'lease_expire_date' ,
        'other_checked' ,
        'other_value' ,

        'created_by',
        'updated_by',
        'deleted_by',
        ];

    protected $guarded = ['id'];

    protected $casts = [
        "letter_of_commitment_checked_at" => ItemCheckListDateTimeCast::class,
        "on_boarding_fee_payment_checked_at" => ItemCheckListDateTimeCast::class,
        "inspection_checked_at" => ItemCheckListDateTimeCast::class,
        "termite_checked_at" => ItemCheckListDateTimeCast::class,
        "appraisal_value_checked_at" => ItemCheckListDateTimeCast::class,
        "driver_license_applicant_checked_at" => ItemCheckListDateTimeCast::class,
        "driver_license_co_applicant_checked_at" => ItemCheckListDateTimeCast::class,
        "soc_sec_card_applicant_checked_at" => ItemCheckListDateTimeCast::class,
        "soc_sec_card_co_applicant_checked_at" => ItemCheckListDateTimeCast::class,
        "renter_insurance_checked_at" => ItemCheckListDateTimeCast::class,
        "flood_certificate_checked_at" => ItemCheckListDateTimeCast::class,
        "landlord_insurance_checked_at" => ItemCheckListDateTimeCast::class,
        "warranty_checked_at" => ItemCheckListDateTimeCast::class,
        "lease_signed_checked_at" => ItemCheckListDateTimeCast::class,
        "lease_expire_date" => "date:Y-m-d",
    ];
    protected $attributes = [

    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

    }

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

    public function client(){
        return $this->hasOne(Client::class,'client_id','id');
    }

    public function scopeBeforeDD($query){
        return $query->where('stage', PropertyStatusConstant::BEFORE_DUE_DILIGENCE);
    }

    public function scopeBeforeDDExpire($query){
        return $query->where('stage', PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE);
    }

    public function scopePortfolio($query){
        return $query->where('stage', PropertyStatusConstant::HOUSE_BOOKED);
//            ->orderBy('updated_at','desc');
    }
    public function scopeCancelledHouse($query){
        return $query->where('stage', PropertyStatusConstant::HOUSE_CANCELLED);
//            ->orderBy('updated_at','desc');
    }
    public function scopeDropoutClient($query){
        return $query->where('stage', PropertyStatusConstant::DROPOUT_CLIENT);
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
