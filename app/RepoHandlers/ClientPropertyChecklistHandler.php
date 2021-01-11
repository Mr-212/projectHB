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
//                dd($this->property);
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
            dd($e);
            DB::rollBack();
            report($e);
        }

        return $isSave;
    }
    public function save(){
        $isSave = false;
        try{
            DB::beginTransaction();
            if($this->client->isDirty()){
                $this->client->save();
            }
            if($this->property->isDirty()){
                $this->property->client_id = $this->property->client_id ? :  $this->client->id;
                $this->property->save();
            }
            if($this->pre_closing->isDirty()) {
                $this->pre_closing->property_id = $this->pre_closing->property_id ? : $this->property->id;
                $this->pre_closing->save();
            }
            DB::commit();
            $isSave = true;

        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            report($e);
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


    public function dropClient(){
        $error = true;
        try {
            DB::beginTransaction();
            $this->client? : $this->getClient();
            $this->client->status = ClientStatusConstant::CLIENT_DROPOUT;
            $this->property ? : $this->getProperty();
            if ($this->client->save()) {
//                $this->copyPropertyToDropoutClient();
                $clone_property = $this->property->replicate();
                $clone_property->parent_id = $this->property->id;
                $clone_property->property_status_id = PropertyStatusConstant::CLIENT_DROPOUT;
                if ($clone_property->save()) {
                    if (isset($this->getPreClosingList()->id) && !empty($this->getPreClosingList()->id)) {
                        $clone_pre_closing = $this->getPreClosingList()->replicate();
                        $clone_pre_closing->property_id = $clone_property->id;
                        $clone_pre_closing->save();
                    }
                    DB::commit();
                }
                $error = false;
            }
        }catch (\Throwable $e){
            DB::rollBack();
            report($e);
        }
        return $error;
    }

    public function copyPropertyToDropoutClient(){

        try {
            $clone_property = $this->property->replicate();
            $clone_property->parent_id = $this->property->id;
            $clone_property->property_status_id = PropertyStatusConstant::CLIENT_DROPOUT;
//            $clone_property->client_id = $this->client->id;


            if ($clone_property->save()) {
                if (isset($this->getPreClosingList()->id) && !empty($this->getPreClosingList()->id)) {
                    $clone_pre_closing = $this->getPreClosingList()->replicate();
                    $clone_pre_closing->property_id = $clone_property->id;
                    $clone_pre_closing->save();
                }
            }
        }catch (\Exception $e){
            report($e);

        }
    }

    public function movePropertyToEvictionAndVacant(){
           $response = false;
        try{
            DB::beginTransaction();
            if($this->vacateProperty()) {
                $this->moveOutProperty();
                $response =  true;
            }

            DB::commit();


        }catch (\Throwable $e){
            DB::rollBack();
            dd($e);
            report($e);
        }
        return $response;

    }

    private function moveOutProperty(){
        try {
//        $this->client ? : $this->getClient();
            $this->property ? : $this->getProperty();

            if(!empty($this->property->id)) {
                $this->property->property_status_id = PropertyStatusConstant::HOUSE_EVICTED;
                $this->property->save();
            }
        }catch (\Throwable $e){

            report($e);
        }
    }

    private function vacateProperty(){

        $is_cloned = false;
        try {
//            $this->client ?: $this->getClient();
            $this->property ? : $this->getProperty();
            $clone_property = $this->property->replicate();
            $clone_property->property_status_id = PropertyStatusConstant::HOUSE_VACANT;
            $clone_property->client_id = NULL;

            if ($clone_property->save()) {
                $this->pre_closing ? : $this->getPreClosingList();
                $clone_pre_closing = $this->pre_closing->replicate();
                $is_cloned =  true;
                if (isset($clone_pre_closing->id) && !empty($clone_pre_closing->id)) {
                    $clone_pre_closing->property_id = $clone_property->id;
                    $clone_pre_closing->save();
                }
            }
        }catch (\Throwable $e){
            dd($e);
            report($e);
        }

        return $is_cloned;
    }





}