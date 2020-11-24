<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\ClientLogs;
use Illuminate\Support\Facades\Auth;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function created(Client $client)
    {
        //
    }

    public function updating(Client $client)
    {

        //dd($client->getOriginal(),$client->getDirty());
        if($client->isDirty('')){

        }
    }

    /**
     * Handle the Client "updated" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function updated(Client $client)
    {
        ClientLogs::create(['client_id'=> $client->id,'action_type' => 'client_update', 'original_data'=>$client->getOriginal(),'new_data' => $client->toArray(),'changes' => $client->getChanges(),'updated_by' => Auth::id()]);

       // dd($client->getOriginal(),$client->getChanges());
       // dd($client->getChanges());
    }

    /**
     * Handle the Client "deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function deleted(Client $client)
    {
        //
    }

    /**
     * Handle the Client "restored" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function restored(Client $client)
    {
        //
    }

    /**
     * Handle the Client "force deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function forceDeleted(Client $client)
    {
        //
    }
}
