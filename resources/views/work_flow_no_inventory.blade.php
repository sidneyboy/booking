<form id="work_flow_no_inventory_proceed_to_final_summary">
    @csrf
    <div class="table table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th colspan="3">New Sales Order</th>
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
                            <input type="hidden" name="new_sales_order_inventory_id[]" value="{{ $data->id }}">
                            <input type="hidden" name="new_sales_order_inventory_description[{{ $data->id }}]"
                                value="{{ $data->description }}">
                        </td>
                        <td><input style="width:100px;" name="new_sales_order_inventory_quantity[{{ $data->id }}]"
                                type="number" min="0" value="0" required class="form-control"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" value="{{ $customer_id }}" name="customer_id">
    <input type="hidden" value="{{ $principal_id }}" name="principal_id">
    <input type="hidden" value="{{ $sku_type }}" name="sku_type">
    </div>
    <button class="btn btn-block btn-info" type="submit">PROCEED</button>
</form>

<script>
    $('.select2').select2();
    $("#work_flow_no_inventory_proceed_to_final_summary").on('submit', (function(e) {
        e.preventDefault();
        //$('.loading').show();
        $.ajax({
            url: "work_flow_no_inventory_proceed_to_final_summary",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                $('#work_flow_suggested_sales_order_page').hide();
                $('#work_flow_final_summary_page').html(data);
            },
        });
    }));
</script>
