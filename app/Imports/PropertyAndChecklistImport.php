<?php

namespace App\Imports;

use App\Mappings\PropertyFields;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class PropertyAndChecklistImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{

    private  $property_fields ;

    public function __construct()
    {
        $this->property_fields = PropertyFields::getMapping();
    }
    /**
    * @param Collection $collection
    */
//    public function collection(Collection $collection)
//    {
//
//        dd($collection);
//        foreach ($collection as $row){
//
//        }
//    }

    public function model(array $row){

        foreach ($row as $k => $v){
            if(strpos($k,'_date')){
                $row[$k] = $this->transformDate($v);
                $v = $this->transformDate($v);
            }
            if(isset($this->property_fields[$k]))
                $row[$this->property_fields[$k]] = $v;

        }
        dd($row);




    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->toDateString();
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value)->toDateString();
        }
    }
}
