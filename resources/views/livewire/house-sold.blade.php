<div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Sold Houses</h1>
                {{--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12 overflow-auto">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th>Status</th>
                    <th >Property Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>ST</th>
                    <th>ZIP</th>
                    <th>TANANT1</th>
                    <th>TANANT2</th>
                    <th>OPTION/Rent</th>
                    <th>Gross Rent</th>
                    <th>Annual Tax</th>
                    <th>Tax</th>
                    <th>Insurance</th>
                    <th>HOA</th>
                    <th>Rent</th>
                    <th>Yield</th>
                    <th>Purchase Price</th>
                    <th>Closing Credit</th>
                    <th>Repair Credit</th>
                    <th>Builder</th>
                    <th>Purchase Date</th>
                    <th>Lease Expiration Date</th>
                    <th>3 MO Option</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    {{--<td><input type="checkbox" name="1" value="1"/>&nbsp;</td>--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    <td>SOLD</td>
                    <td>1304 Eddie Craig</td>
                    <td>McDonough</td>
                    <td>Henry</td>
                    <td>GA</td>
                    <td>30252</td>
                    <td>Rontaye Johnson</td>
                    <td>Kinyatta Johnson</td>
                    <td>$3.6</td>
                    <td>$2470</td>
                    <td>&3595</td>
                    <td>$300</td>
                    <td>$150</td>
                    <td>$120</td>
                    <td>$1900</td>
                    <td>8.3%</td>
                    <td>$1200</td>
                    <td>$2400</td>
                    <td>$100</td>
                    <td>XY</td>
                    <td>12-07-2019</td>
                    <td>$5000</td>
                </tr>
                <tr>
                    {{--<td><input type="checkbox" name="1" value="1"/>&nbsp;</td>--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    <td>SOLD</td>
                    <td>1304 Eddie Craig</td>
                    <td>McDonough</td>
                    <td>Henry</td>
                    <td>GA</td>
                    <td>30252</td>
                    <td>Rontaye Johnson</td>
                    <td>Kinyatta Johnson</td>
                    <td>$3.6</td>
                    <td>$2470</td>
                    <td>&3595</td>
                    <td>$300</td>
                    <td>$150</td>
                    <td>$120</td>
                    <td>$1900</td>
                    <td>8.3%</td>
                    <td>$1200</td>
                    <td>$2400</td>
                    <td>$100</td>
                    <td>XY</td>
                    <td>12-07-2019</td>
                    <td>12-07-2029</td>
                    <td>$5000</td>
                </tr>
                <tr>
                    {{--<td><input type="checkbox" name="1" value="1"/>&nbsp;</td>--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    <td>SOLD</td>
                    <td>1304 Eddie Craig</td>
                    <td>McDonough</td>
                    <td>Henry</td>
                    <td>GA</td>
                    <td>30252</td>
                    <td>Rontaye Johnson</td>
                    <td>Kinyatta Johnson</td>
                    <td>$3.6</td>
                    <td>$2470</td>
                    <td>&3595</td>
                    <td>$300</td>
                    <td>$150</td>
                    <td>$120</td>
                    <td>$1900</td>
                    <td>8.3%</td>
                    <td>$1200</td>
                    <td>$2400</td>
                    <td>$100</td>
                    <td>XY</td>
                    <td>12-07-2019</td>
                    <td>12-07-2029</td>
                    <td>$5000</td>
                </tr>
                <tr>
                    {{--<td><input type="checkbox" name="1" value="1"/>&nbsp;</td>--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    <td>SOLD</td>
                    <td>1304 Eddie Craig</td>
                    <td>McDonough</td>
                    <td>Henry</td>
                    <td>GA</td>
                    <td>30252</td>
                    <td>Rontaye Johnson</td>
                    <td>Kinyatta Johnson</td>
                    <td>$3.6</td>
                    <td>$2470</td>
                    <td>&3595</td>
                    <td>$300</td>
                    <td>$150</td>
                    <td>$120</td>
                    <td>$1900</td>
                    <td>8.3%</td>
                    <td>$1200</td>
                    <td>$2400</td>
                    <td>$100</td>
                    <td>XY</td>
                    <td>12-07-2019</td>
                    <td>12-07-2021</td>
                    <td>$5000</td>
                </tr>






                </tbody>
            </table>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        // $(document).find('input:checkbox').click(function () {
        //     if($(this).is(':checked')) {
        //         var now = new Date();
        //         var dateString = now.toLocaleTimeString()+ ' '+ now.toLocaleDateString();
        //         $(this).parent().siblings('#item_checked_at').text(dateString);
        //         window.location.href = '/items/checklist/'+$(this).val();
        //
        //     }
        //     else
        //         $(this).parent().siblings('#item_checked_at').val('').text('');
        //
        // })

    </script>
@endpush
