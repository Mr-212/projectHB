<?php

namespace App\Models;

use App\Constants\StageConstant;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ClientProperty extends Model
{

    protected $table = 'client_property';
    protected $fillable = [

        "client_id",
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

    protected $guarded = ['id'];

    protected $casts = [

    ];
    protected $attributes = [

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
