<?php

namespace App\Models;

use App\Constants\StageConstant;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ClientPreClosingChecklist extends Model
{

    protected $table = 'client_pre_closing_checklist';
    protected $fillable = [

        "client_id",
        "rent" ,
        "payment_option_3_month" ,
        "payment_option_6_month" ,
        "payment_option_12_month" ,

        "option_payment_date" ,
        "option_payment_date_checked" ,

        "letter_of_commitment_signed_checked" ,
        "on_boarding_fee_payment_checked" ,



        "inspection_checked" ,
//        "inspection_check_date" ,
        'termite_checked' ,
        'termite_paid_by' ,

        'septic_inspection_checked' ,

        'repair_credit_checked' ,
        'repair_credit' ,

        'appraisal_value_checked' ,
        'appraisal_value' ,



        'driver_license_applicant_checked' ,
        'driver_license_co_applicant_checked' ,
        'soc_sec_card_applicant_checked' ,
        'soc_sec_card_co_applicant_checked' ,

        'renter_insurance_checked' ,
        'renter_insurance_name' ,

        'flood_certificate_checked' ,

        'landlord_insurance_checked' ,

        'warranty_checked' ,
        'warranty_company_name' ,
        'warranty_paid_by_seller_checked' ,


        'lease_signed_checked' ,
        'lease_expire_checked' ,
        'lease_expire_date' ,
        'option_checked' ,
        'other_checked' ,
        'other_value' ,

        'created_by',
        'updated_by',
        'deleted_by',
        ];

    protected $guarded = ['id'];

    protected $casts = [

    ];
    protected $attributes = [

    ];

    public function __construct($client_id = null, array $attributes = array())
    {
        parent::__construct($attributes);

        $this->client_id = $client_id;
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
