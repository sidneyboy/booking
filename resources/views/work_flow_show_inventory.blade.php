<form id="work_flow_suggested_sales_order">
    @csrf
    <div class="table table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th colspan="3">Prev. Sales Order</th>
                </tr>
                <tr>
                    <th>Desc</th>
                    <th>BO</th>
                    <th>Remaining</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prev_inventory as $data)
                    <tr>
                        <td>
                            {{ $data->description }} <br />
                            {{ $data->sku_type }}
                            <input type="hidden" name="prev_inventory_id[]" value="{{ $data->id }}">
                        </td>
                        <td><input style="width:100px;" name="bo[{{ $data->id }}]" type="number" min="0"
                                value="0" required class="form-control"></td>
                        <td><input style="width:100px;" name="remaining[{{ $data->id }}]" type="number"
                                min="0" value="0" required class="form-control"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th colspan="3">Sales Order</th>
                </tr>
                <tr>
                    <th>Desc</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales_order_inventory as $data)
                    <tr>
                        <td>
                            {{ $data->description }} <br />
                            {{ $data->sku_type }}
                            <input type="hidden" name="sales_order_inventory[]" value="{{ $data->id }}">
                        </td>
                        <td><input style="width:100px;" name="order_quantity[{{ $data->id }}]" type="number"
                                min="0" value="0" required class="form-control"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" value="{{ $customer_id }}" name="customer_id">
    <input type="hidden" value="{{ $principal_id }}" name="principal_id">
    <button class="btn btn-block btn-info" type="submit">PROCEED</button>
</form>


<script>
    $("#work_flow_suggested_sales_order").on('submit', (function(e) {
        e.preventDefault();
        //$('.loading').show();
        $.ajax({
            url: "work_flow_suggested_sales_order",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                $('#work_flow_suggested_sales_order_page').html(data);
            },
        });
    }));
</script>
