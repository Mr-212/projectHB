<?php

namespace App\Models;

use App\Constants\PropertyStatusConstant;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Auth;

class ClientProperty extends Model
{

    protected $table = 'client_properties';
    protected $fillable = [

        "client_id",
        'property_id',
        'pre_closing_checklist_id',
        'status_id',
        'created_by',
        'updated_by',
        ];


    protected $casts = [
//        'closing_date' => 'date:Y-m-d',
//        'due_diligence_expire_date' => 'date:Y-m-d',
//        'deal_save_checked_at' => 'date:Y-m-d',

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
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function property(){
        return $this->hasOne(Property::class,'id','property_id');
    }

    public function pre_closing_checklist(){
        return $this->hasOne(PropertyPreClosingChecklist::class,'id','pre_closing_checklist_id');
    }

    public function status(){
        return PropertyStatusConstant::getValueByKey($this->status_id);
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
