<form id="work_flow_new_customer_final_summary">
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
                @foreach ($inventory_data as $data)
                    <tr>
                        <td>
                            {{ $data->description }} <br />
                            {{ $data->sku_type }}
                        </td>
                        <td><input style="width:100px;" name="new_sales_order_inventory_quantity[{{ $data->id }}]"
                                type="number" min="0" value="0" required class="form-control"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <input type="hidden" value="{{ $principal_id }}" name="principal_id">
    <input type="hidden" value="{{ $sku_type }}" name="sku_type">
    <button class="btn btn-block btn-info" type="submit">PROCEED</button>
</form>

<script>
    $("#work_flow_new_customer_final_summary").on('submit', (function(e) {
        e.preventDefault();
        //$('.loading').show();
        $.ajax({
            url: "work_flow_new_customer_final_summary",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                $('#work_flow_final_summary_page').html(data);
            },
        });
    }));
</script>
