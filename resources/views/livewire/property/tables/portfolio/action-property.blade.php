<div class="w-100 mw-100">
    @if(isset($field))
            @livewire('component.property-repair-request-component',["property_id" => $property_id,"field"=>$field],key($property_id))
    @endif
    @if(isset($rent) && isset($key))
            @livewire('component.edit-input-component',['input_type' =>'number','key' => $key, 'value'=>$rent, "property_id" => $property_id,'object_type'=>'pre_closing'],key($property_id))
    @endif
</div>