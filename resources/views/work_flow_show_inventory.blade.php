<form id="work_flow_suggested_sales_order">
    @csrf
    <div class="table table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>Desc</th>
                    <th>Received</th>
                    <th>BO</th>
                    <th>Remaining</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventory as $data)
                    <tr>
                        <td>
                            {{ $data->description }} <br />
                            {{ $data->sku_type }}
                            <input type="hidden" name="inventory_id[]" value="{{ $data->id }}">
                        </td>
                        <td><input style="width:100px;" name="received[{{ $data->id }}]" type="number" min="0"
                                value="0" required class="form-control"></td>
                        <td><input style="width:100px;" name="bo[{{ $data->id }}]" type="number" min="0"
                                value="0" required class="form-control"></td>
                        <td><input style="width:100px;" name="remaining[{{ $data->id }}]" type="number"
                                min="0" value="0" required class="form-control"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
