<form id="work_flow_no_inventory_save">
    <div id="export_table_as_image" style="background-color:antiquewhite">
        <table class="table table-borderless table-sm" style="font-size: 17px;font-family: Arial, Helvetica, sans-serif;">
            <thead>
                <tr>
                    <th style="text-align: center;" colspan="3">JULMAR COMMERCIAL INC.</th>
                </tr>
                <tr>
                    <th style="text-align: center;" colspan="3">OSMENA ST., CDO</th>
                </tr>
                <tr>
                    <th style="text-align: center;" colspan="3">TEL 857-6197, 858-5771</th>
                </tr>
                <tr>
                    <th style="text-align: center;" colspan="3">Vat Reg. TIN 486-701-947-000</th>
                </tr>
                <tr>
                    <th style="text-align: center;" colspan="3">REP: {{ $agent_user->agent_name }}</th>
                </tr>
                <tr>
                    <th style="text-align: center;" colspan="3">{{ $date }}</th>
                </tr>
                <tr>
                    <th style="text-align: center;text-transform:uppercase" colspan="3">{{ $customer_principal_price->customer->mode_of_transaction }}</th>
                </tr>
            </thead>
        </table>
        <table class="table table-borderless table-sm"
            style="font-size: 17px;font-family: Arial, Helvetica, sans-serif;">
            <thead>
                <tr>
                    <th>Desc</th>
                    <th>Qty</th>
                    <th>U/P</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventory_data as $data)
                    <tr>
                        <th>{{ $data->description }}</th>
                        <th style="text-align: right">{{ $new_sales_order_inventory_quantity[$data->id] }}</th>
                        <th style="text-align: right">
                            @if ($customer_principal_price->price_level == 'price_1')
                                @php
                                    $unit_price = $data->price_1;
                                @endphp
                                {{ number_format($data->price_1, 2, '.', ',') }}
                            @elseif($customer_principal_price->price_level == 'price_2')
                                @php
                                    $unit_price = $data->price_2;
                                @endphp
                                {{ number_format($data->price_2, 2, '.', ',') }}
                            @elseif($customer_principal_price->price_level == 'price_3')
                                @php
                                    $unit_price = $data->price_3;
                                @endphp
                                {{ number_format($data->price_3, 2, '.', ',') }}
                            @elseif($customer_principal_price->price_level == 'price_4')
                                @php
                                    $unit_price = $data->price_4;
                                @endphp
                                {{ number_format($data->price_4, 2, '.', ',') }}
                            @endif

                            <input type="hidden" value="{{ $unit_price }}" name="unit_price[{{ $data->id }}]">
                        </th>
                        <th style="text-align: right">
                            @php
                                $sub_total = $unit_price * $new_sales_order_inventory_quantity[$data->id];
                                echo number_format($sub_total, 2, '.', ',');
                                $sum_total[] = $sub_total;
                            @endphp
                            <input type="hidden" value="{{ $data->id }}" name="inventory_id[]">
                            <input type="hidden" value="{{ $new_sales_order_inventory_quantity[$data->id] }}"
                                name="sales_order_quantity[{{ $data->id }}]">
                        </th>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th style="text-align: right">{{ number_format(array_sum($sum_total), 2, '.', ',') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <input type="hidden" name="agent_id" value="{{ $agent_user->agent_id }}">
    <input type="hidden" name="total_amount" value="{{ array_sum($sum_total) }}">
    <input type="hidden" name="principal_id" value="{{ $principal_id }}">
    <input type="hidden" name="customer_id" value="{{ $customer_id }}">
    <input type="hidden" name="sku_type" value="{{ $sku_type }}">
    <input type="hidden" name="mode_of_transaction" value="{{ $customer_principal_price->customer->mode_of_transaction }}">


    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-info btn-block" id="convert">Export as Image</button>
        </div>
        <div class="col-md-12">
            <br />
            <button type="submit" class="btn btn-block btn-success">Submit Sales Order</button>
        </div>
    </div>
</form>

<div style="" id="result"></div>



<script>
    $("#convert").on('click', (function(e) {
        $('.loading').show();
        var resultDiv = document.getElementById("result");
        html2canvas(document.getElementById("export_table_as_image"), {
            onrendered: function(canvas) {
                var img = canvas.toDataURL("image/png");
                result.innerHTML =
                    '<a download="{{ $customer_principal_price->customer->store_name }} - SALES ORDER.jpeg" style="display:block;width:100%;border:none;background-color: #04AA6D;padding: 14px 28px;font-size: 16px;cursor: pointer;text-align: center;color:white;" href="' +
                    img + '" id="download_button">DOWNLOAD IMAGE</a>';
                $('.loading').hide();
                document.getElementById('download_button').click();
                $('#download_button').hide();
            }
        });
    }));


    $("#work_flow_no_inventory_save").on('submit', (function(e) {
        e.preventDefault();
        $('.loading').show();
        $.ajax({
            url: "work_flow_no_inventory_save",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                window.location.href = "/collection";  
            },
        });
    }));
</script>
