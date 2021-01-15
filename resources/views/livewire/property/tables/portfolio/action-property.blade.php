<div class="w-100 mw-100">
    @if(isset($field))
            @livewire('component.property-repair-request-component',["property_id" => $property_id,"field"=>$field])

    @endif


    @if(isset($closing_cost) && isset($key))
            @livewire('component.edit-input-component',['input_type' =>'number','key' => $key, 'value'=>$closing_cost, "property_id" => $property_id])
    @endif
</div>