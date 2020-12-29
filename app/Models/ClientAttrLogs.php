<?php

namespace App\Models;

use App\Constants\StageConstant;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ClientAttrLogs extends Model
{

    use HasFactory;
    protected $fillable = [
        'client_id',
        'attribute',
        'value',
        'checked_at',
        'comment',
        'updated_by'
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

    public function client(){
        return $this->hasMany(Client::class,'client_id','id');
    }
    public function pre_closing(){
        return $this->belongsTo(ClientPreClosingChecklist::class,'id','client_id');
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
