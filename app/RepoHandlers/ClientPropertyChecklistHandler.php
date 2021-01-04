<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 12/31/20
 * Time: 1:29 PM
 */

namespace App\RepoHandlers;


use App\Constants\ClientStatusConstant;
use App\Constants\PropertyStatusConstant;
use App\Models\Client;
use App\Models\ClientPreClosingChecklist;
use App\Models\Property;
use Illuminate\Support\Facades\DB;

class ClientPropertyChecklistHandler
{
    private $client,$property,$pre_closing;
    private $client_id, $property_id;

    public function __construct($client_id = null, $property_id = null)
    {
         $this->client = $client_id ? Client::find($client_id) : null;
         $this->property = $property_id ? Property::find($property_id) : null;
//         dd($this->property);
    }


    public function getClient(){
        return $this->client = $this->client ? : (!empty($this->property->client) ? $this->property->client: new Client());

    }

    public function getProperty(){
        return $this->property = $this->property ? : ($this->client->property ? : new Property());
    }

    public function getPreClosingList(){
        return $this->pre_closing = $this->pre_closing ? : ($this->property->pre_closing ? : new ClientPreClosingChecklist());
    }

    public function  setClient(CLient $client){
        $this->client = $client;
    }

    public function  setProperty(Property $property){
        $this->property = $property;
    }

    public function  setPreClosingList(ClientPreClosingChecklist $pre_closing){
        $this->pre_closing = $pre_closing;
    }

    public function saveClientPropertyAndPreClosing(){
        $isSave = false;
        try{
            DB::beginTransaction();
            if($this->client->save()){
                $this->property->client_id = $this->client->id;
                if($this->property->save()){
                    $this->pre_closing->property_id = $this->property->id;
                    if($this->pre_closing->save()) {
                        DB::commit();
                        $isSave = true;
                    }
                }
            }

        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }

        return $isSave;
    }

    public function saveClient(){
        $isSave = false;
        try{
            DB::beginTransaction();
            if($this->client->save()){
                        DB::commit();
                        $isSave = true;
            }
        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }

        return $isSave;
    }

    public function saveProperty(){
        $isSave = false;
        try{
            DB::beginTransaction();
            if($this->property->save()){
                        DB::commit();
                        $isSave = true;
            }
        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }

        return $isSave;
    }


    public function dropoutClient(){

        $this->client = $this->client ? $this->client :$this->getClient();
        $this->client->status = ClientStatusConstant::CLIENT_DROPOUT;
        $this->property = $this->property ? $this->property : $this->getProperty();
        $this->property->property_status_id = PropertyStatusConstant::CLIENT_DROPOUT;
        if($this->saveClient() && $this->saveProperty()){
            $this->detachPropertyFromClient();
        }
    }

    public function detachPropertyFromClient(){


        try {
            $clone_property = $this->getProperty()->replicate();
            $clone_property->parent_id = $this->getProperty()->id;
            $clone_property->client_id = null;
            $clone_property->property_status_id = PropertyStatusConstant::HOUSE_VACANT;

            if ($clone_property->save()) {
                if (isset($this->getPreClosingList()->id) && !empty($this->getPreClosingList()->id)) {
                    $clone_pre_closing = $this->getPreClosingList()->replicate();
                    $clone_pre_closing->property_id = $clone_property->id;
                    $clone_pre_closing->save();
                }
            }
        }catch (\Exception $e){

        }
    }




}