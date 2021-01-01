
<div>
    {{--<a href="#sold-modal"  class="btn btn-primary p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">--}}
    <a href="#sold-modal" data-toggle="modal" data-target="#sold-modal" class="btn btn-primary btn-sm">Sold</a>

    <div class="modal fade" tabindex="-1" role="dialog" id="sold-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Price and Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-lg-12">
                        <label>Sell price</label>
                        <input class="form-control" type="number" >
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <label>Sell Data</label>
                        <input class="form-control" type="date" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>