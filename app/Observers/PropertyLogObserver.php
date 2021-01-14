<?php

namespace App\Observers;

use App\Models\Property;
use App\Models\PropertyLogs;
use Illuminate\Support\Facades\Auth;

class PropertyLogObserver
{
    /**
     * Handle the PropertyLogs "created" event.
     *
     * @param  \App\Models\PropertyLogs  $propertyLogs
     * @return void
     */
    public function created(Property $propertyLogs)
    {
        if($propertyLogs->isDirty())
            PropertyLogs::create(['property_id'=> $propertyLogs->id,'client_id'=>$propertyLogs->client_id,'action_type' => 'create', 'original_data'=>$propertyLogs->getOriginal(),'new_data' => $propertyLogs->toArray(),'changes' => $propertyLogs->getChanges(),'updated_by' => Auth::id()]);

    }

    /**
     * Handle the PropertyLogs "updated" event.
     *
     * @param  \App\Models\PropertyLogs  $propertyLogs
     * @return void
     */
    public function updated(Property $propertyLogs)
    {
        if($propertyLogs->isDirty())
            PropertyLogs::create(['property_id'=> $propertyLogs->id, 'client_id'=>$propertyLogs->client_id, 'action_type' => 'update', 'original_data'=>$propertyLogs->getOriginal(),'new_data' => $propertyLogs->toArray(),'changes' => $propertyLogs->getChanges(),'updated_by' => Auth::id()]);

    }

    /**
     * Handle the PropertyLogs "deleted" event.
     *
     * @param  \App\Models\PropertyLogs  $propertyLogs
     * @return void
     */
    public function deleted(Property $propertyLogs)
    {
        //
    }

    /**
     * Handle the PropertyLogs "restored" event.
     *
     * @param  \App\Models\PropertyLogs  $propertyLogs
     * @return void
     */
    public function restored(Property $propertyLogs)
    {
        //
    }

    /**
     * Handle the PropertyLogs "force deleted" event.
     *
     * @param  \App\Models\PropertyLogs  $propertyLogs
     * @return void
     */
    public function forceDeleted(Property $propertyLogs)
    {
        //
    }
}
