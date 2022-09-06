<style>
    .current_inventory th:first-child,
    .current_inventory td:first-child {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    }
</style>


<form id="">
    <div class="table table-responsive">
        <table class="table table-bordered table-hover table-sm current_inventory">
            <thead>
                <tr>
                    <th>Delivery Date</th>
                    <th colspan="3">{{ $delivery_date }}</th>
                </tr>
                <tr>
                    <th>Desc</th>
                    <th>Delivered QTY</th>
                    {{-- <th>Current Inventory</th>
                          <th>BO</th> --}}
                    <th>U/P</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventory_data as $data)
                    <tr>
                        <td>{{ $data->description }}</td>
                        <td>
                            {{ $current_sku_inventory[$data->id] }}
                            <input type="hidden" name="current_sku_inventory[{{ $data->id }}]"
                                value="{{ $current_sku_inventory[$data->id] }}">

                        </td>
                        <td>
                            {{ $unit_price[$data->id] }}
                            <input type="hidden" class="form-control unit_price" name="unit_price[{{ $data->id }}]"
                                value="{{ $unit_price[$data->id] }}" style="width:100px;">
                            @php
                                $total = $current_sku_inventory[$data->id] * $unit_price[$data->id];
                                $gross[] = $total;
                            @endphp
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>Total Discount</td>
                    <td></td>
                    <td>
                        {{ $total_discount }}
                        <input type="hidden" class="form-control unit_price" name="total_discount" style="width:100px;"
                            value="{{ $total_discount }}">
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <input type="text" name="customer_id" value="{{ $customer_id }}">
    <input type="text" name="principal_id" value="{{ $principal_id }}">
    <input type="text" name="sku_type" value="{{ $sku_type }}">
    <input type="text" name="delivery_date" value="{{ $delivery_date }}">
    <button class="btn btn-info btn-block">Proceed To Final Summary</button>
</form>

<script>
    $('.unit_price').keyup(function() {
        var val = $(this).val();
        if (isNaN(val)) {
            val = val.replace(/[^0-9\.]/g, '');
            if (val.split('.').length > 2)
                val = val.replace(/\.+$/, "");
        }
        $(this).val(val);
    });

    //     $("#").on('submit', (function(e) {
    //         e.preventDefault();
    //         //$('.loading').show();
    //         $.ajax({
    //             url: "",
    //             type: "POST",
    //             data: new FormData(this),
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             success: function(data) {
    //                 $('.loading').hide();
    //                 // $('#work_flow_suggested_sales_order_page').hide();
    //                 $('#work_flow_final_summary_page').html(data);
    //             },
    //         });
    //     }));
</script>
