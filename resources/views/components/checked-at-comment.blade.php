{{--@props(['checked'=>null])--}}

<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="">
            <label>Checked At</label>
            <input type="text" class="form-control" wire:model="{{ $checked }}" readonly="readonly">
        </div>

    </div>

    <div class="col-md-6 col-lg-6">
        <label>Comment</label>
        <input type="text" class="form-control" placeholder="Add Comment" wire:model="{{$comment}}">
        {{--<input type="text" class="form-control" placeholder="Add Comment" wire:model="{{}}">--}}

    </div>
</div>