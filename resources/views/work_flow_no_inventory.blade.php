{{-- <style>
    .current_inventory th:first-child,
    .current_inventory td:first-child {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    }
</style> --}}

<form id="work_flow_no_inventory_proceed_to_final_summary" >
    @csrf
    <div class="table table-responsive">
        <table class="table table-sm table-bordered" id="example2">
            <thead>
                <tr>
                    <th colspan="2">Current Inventory</th>
                </tr>
                <tr>
                    <td>Delivery Date</td>
                    <td><input type="date" class="form-control" required name="delivery_date"></th>
                </tr>
                <tr>
                    <th>Desc</th>
                    <th>Delivered QTY</th>
                    {{-- <th>U/P</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($sales_order_inventory as $data)
                    <tr>
                        <td>
                            {{ $data->description }} <br />
                            {{ $data->sku_type }}
                        </td>
                        <td><input type="number" min="0" class="form-control" value="0" name="delivered_quantity[{{ $data->id }}]"></td>
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
                // $('#work_flow_suggested_sales_order_page').hide();
                $('#work_flow_suggested_sales_order_page').html(data);
            },
        });
    }));

    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
    });
</script>
