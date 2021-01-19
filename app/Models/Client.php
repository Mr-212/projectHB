<?php

namespace App\Models;

use App\Constants\ClientStatusConstant;
use App\Constants\PropertyStatusConstant;
use App\Models\Casts\ItemCheckListDateTimeCast;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Support\Facades\Auth;

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
        'stage',

//        'mortgage_type_id' ,
//        'rental_verification_checked',
//        'rental_verification_checked_at',
//        'welcome_payment',
//        'welcome_payment_checked',
//        'welcome_payment_checked_at',



        'created_by',
        'updated_by',
        'deleted_by',
        ];

    protected $guarded = ['id'];

    protected $casts = [
//          'welcome_payment_checked_at' => ItemCheckListDateTimeCast::class,
//          'rental_verification_checked_at' => ItemCheckListDateTimeCast::class,
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

    public function scopeActive($query)
    {
//        $builder->where('status', '!=', ClientStatusConstant::CLIENT_DROPOUT);
        $query->where(function ($q){
            $q->where('status', ClientStatusConstant::CLIENT_ACTIVE);
            $q->orWhereNULL('status');
        });
    }


    public function getIsClientDroppedAttribute(){
        return $this->status == ClientStatusConstant::CLIENT_DROPOUT ? TRUE : FALSE;
    }

    public function property(){
        return $this->belongsTo(Property::class,'id','client_id');
    }
//    public function property(){
//        return $this->belongsTo(Property::class,'id','client_id')
//            ->where('properties.property_status_id',PropertyStatusConstant::CLIENT_DROPOUT);
//    }
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
        return $this->belongsTo(PreClosingChecklist::class,'id','client_id');
    }

    public function scopeBeforeDD($query){
//        return $query->where('stage', PropertyStatusConstant::BEFORE_DUE_DILIGENCE);
//        return $query->whereHas('property', function (Builder $builder){
//            $builder->where('property_status_id', PropertyStatusConstant::BEFORE_DUE_DILIGENCE);
//        });

        return $query->whereHas('property', function ( $query){
            $query->where('property_status_id', null);
        });
    }

//    public function scopeBeforeDDExpire($query){
//
//        return $query->whereHas('property', function ($query){
//            $query->where('property_status_id', PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE);
//        });
//    }

    public function scopeBeforeDDExpireQuery($query){

        return
            $query ->leftjoin('properties',function ($join){
                $join->on('clients.id','=','properties.client_id')
                    ->where(function ($q){
                        $q->where('property_status_id', PropertyStatusConstant::BEFORE_DUE_DILIGENCE)
                            ->orWhereNULL('property_status_id');
                    });
            })->leftjoin('pre_closing_checklist','pre_closing_checklist.property_id','properties.id');
    }

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

    }
    public function scopeDropoutProperty($query){

        $query->leftJoin('properties as property','clients.id','property.client_id')
            ->where('properties.property_status_id',PropertyStatusConstant::CLIENT_DROPOUT);
    }
//    public function scopeDropoutProperty($query){
//
////            $query->where('clients.status', ClientStatusConstant::CLIENT_DROPOUT);
//            $query->whereHas('property',function ( $q){
//                  $q->where('properties.property_status_id', PropertyStatusConstant::CLIENT_DROPOUT);
//        });
//        return $query;
//
//    }


    public function last_updated_by()
    {
        return $this->hasOne(User::class,'updated_by','id');
    }

    public function getPaymentOptionList(){
        return ClientItemCheckListVariables::getPaymentOptionList();
    }
}
