<?php

namespace App\Models;

use App\Constants\PropertyStatusConstant;
use App\Models\Casts\ItemCheckListDateTimeCast;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';
    protected $fillable = [

        "client_id",
        "deal_save_checked",
        "deal_save_checked_at",
        "deal_save_checked_by",
        "deal_save_checked_comment",

        "house_number_and_street",
        "county" ,
        "state" ,
        "city" ,
        "zip",
        'new_construction_check',
        "new_construction_builder_name",
        "purchase_price" ,
        "closing_cost" ,
        "closing_credit_general" ,
        "annual_property_tax" ,

        "hoa_check" ,
        "hoa_name" ,
        "hoa_phone" ,

        "repair_request_check" ,
        "repair_request_item_names" ,

        "lender_check" ,
        "lender_name" ,

        "closing_date" ,
        "due_diligence_expire_date" ,

        'created_by',
        'updated_by',
        'deleted_by',
        ];

//    protected $guarded = ['id'];

    protected $casts = [
        'closing_date' => 'date:Y-m-d',
        'due_diligence_expire_date' => 'date:Y-m-d',
//        'deal_save_checked_at' => 'datetime:Y-m-d  h:i:s A',
        'deal_save_checked_at' => ItemCheckListDateTimeCast::class,

    ];
    protected $attributes = [


    ];

    public function __construct($client_id = null, array $attributes = array())
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
        return $this->hasOne(Client::class,'id','client_id');
    }
    public function pre_closing(){
        return $this->hasOne(PropertyPreClosingChecklist::class,'property_id','id');
    }

    public function scopeHouseVacant($query){
        return $query->where('property_status_id', PropertyStatusConstant::HOUSE_VACANT);
    }
    public function scopeHouseSold($query){
        return $query->where('property_status_id', PropertyStatusConstant::HOUSE_SOLD);
    }

    public function scopeBeforeDD($query){
        return $query->where('stage', PropertyStatusConstant::BEFORE_DUE_DILIGENCE);
    }

    public function scopeBeforeDDExpire($query){
        return $query->where('property_status_id', PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE);
    }

    public function scopePortfolio($query){
        return $query->where('property_status_id', PropertyStatusConstant::HOUSE_BOOKED);
//            ->orderBy('updated_at','desc');
    }
    public function scopeCancelledHouse($query){
        return $query->where('property_status_id', PropertyStatusConstant::HOUSE_CANCELLED);
//            ->orderBy('updated_at','desc');
    }
    public function scopeDropoutClient($query){
        return $query->where('property_status_id', PropertyStatusConstant::DROPOUT_CLIENT);
//            ->orderBy('updated_at','desc');
    }
    public function scopeHouseEvicted($query){
        return $query->where('property_status_id', PropertyStatusConstant::HOUSE_EVICTED);
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
