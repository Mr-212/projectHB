<?php

namespace App\Observers;

use App\Models\PreClosingLogs;
use App\Models\PreClosingChecklist;
use Illuminate\Support\Facades\Auth;

class PreClosingObserver
{
    /**
     * Handle the PreClosing "created" event.
     *
     * @param  \App\Models\PreClosing  $preClosing
     * @return void
     */
    public function created(PreClosingChecklist $preClosing)
    {
        if($preClosing->isDirty())
            PreClosingLogs::create(['pre_closing_id'=> $preClosing->id, 'property_id'=>$preClosing->property_id, 'action_type' => 'create', 'original_data'=>$preClosing->getOriginal(),'new_data' => $preClosing->toArray(),'changes' => $preClosing->getChanges(),'updated_by' => Auth::id()]);

    }

    /**
     * Handle the PreClosing "updated" event.
     *
     * @param  \App\Models\PreClosing  $preClosing
     * @return void
     */
    public function updated(PreClosingChecklist $preClosing)
    {
        if($preClosing->isDirty())
            PreClosingLogs::create(['pre_closing_id'=> $preClosing->id,'property_id'=>$preClosing->property_id, 'action_type' => 'create', 'original_data'=>$preClosing->getOriginal(),'new_data' => $preClosing->toArray(),'changes' => $preClosing->getChanges(),'updated_by' => Auth::id()]);

    }

    /**
     * Handle the PreClosing "deleted" event.
     *
     * @param  \App\Models\PreClosing  $preClosing
     * @return void
     */
    public function deleted(PreClosingChecklist $preClosing)
    {
        PreClosingLogs::create(['pre_closing_id'=> $preClosing->id, 'property_id'=>$preClosing->property_id, 'action_type' => 'delete', 'original_data'=>$preClosing->getOriginal(),'new_data' => $preClosing->toArray(),'changes' => $preClosing->getChanges(),'updated_by' => Auth::id()]);

    }

    /**
     * Handle the PreClosing "restored" event.
     *
     * @param  \App\Models\PreClosing  $preClosing
     * @return void
     */
    public function restored(PreClosingChecklist $preClosing)
    {
        PreClosingLogs::create(['pre_closing_id'=> $preClosing->id, 'property_id'=>$preClosing->property_id, 'action_type' => 'restore', 'original_data'=>$preClosing->getOriginal(),'new_data' => $preClosing->toArray(),'changes' => $preClosing->getChanges(),'updated_by' => Auth::id()]);

    }

    /**
     * Handle the PreClosing "force deleted" event.
     *
     * @param  \App\Models\PreClosing  $preClosing
     * @return void
     */
    public function forceDeleted(PreClosingChecklist $preClosing)
    {
        PreClosingLogs::create(['pre_closing_id'=> $preClosing->id, 'property_id'=>$preClosing->property_id, 'action_type' => 'force_delete', 'original_data'=>$preClosing->getOriginal(),'new_data' => $preClosing->toArray(),'changes' => $preClosing->getChanges(),'updated_by' => Auth::id()]);

    }
}
