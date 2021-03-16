<?php

namespace App\Imports;

use App\Constants\Dropdowns\MortgageTypeDropdown;
use App\Constants\PropertyStatusConstant;
use App\Imports\ModelMappings\PropertyFields;
use App\Imports\ModelMappings\PreClosingFields;
use App\Models\PreClosingChecklist;
use App\Models\Property;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class PropertyAndChecklistImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{

    public function __construct()
    {

    }
    /**
    * @param Collection $collection
    */


    public function model(array $row){



        $property_fields =[];
        $pre_closing_fields =[];
        $property_id = null;

        $tenants = '';
        $tenants_count = 1;

        foreach ($row as $k => $v){
            try {
                if (strpos($k, '_date') && !empty($v) && $v != 'NA') {
                    $v = @$this->transformDate($v);
                }

                if($k == 'fhava'){
                    $v = MortgageTypeDropdown::getKeyByValue($v);
                }
                if (isset(PropertyFields::getMappings()[$k])) {
                    $property_fields[PropertyFields::getMappings()[$k]] = $v;
                }

                if (isset(PreClosingFields::getMappings()[$k])) {
                    $pre_closing_fields[PreClosingFields::getMappings()[$k]] = $v;
                }
                if(!empty($property_fields['tenant'.$tenants_count])) {
                    if($tenants_count == 1)
                        $tenants .= $property_fields['tenant' . $tenants_count];
                        else
                    $tenants .= ', ' . $property_fields['tenant' . $tenants_count];
                    $tenants_count++;
                }


            }catch (\Exception $e){
                dd($e,$v);
            }


        }

        if($tenants)
            $property_fields['additional_tenant_name']  = $tenants;

        if ($property_fields) {
            $property_fields['property_status_id'] = PropertyStatusConstant::HOUSE_VACANT;
           // dd($property_fields);

            try {
                DB::beginTransaction();
                $property_id = Property::create($property_fields);
                $pre_closing_fields['property_id'] = @$property_id['id'];
                //var_dump($pre_closing_fields);
                if ($pre_closing_fields)
                    $pre_closing_id = PreClosingChecklist::create($pre_closing_fields);
                $property_fields = null;
                $pre_closing_fields = null;
                DB::commit();
            }catch (\Exception $e){
                DB::rollBack();

            }
        }
        return;
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->toDateTimeString();
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value)->toDateTimeString();
        }
    }
}
