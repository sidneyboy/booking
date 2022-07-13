<form id="work_flow_no_inventory_save">
    <div class="table table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>{{ $customer_principal_price->customer->store_name }}</th>
                    <th>{{ $customer_principal_price->principal->principal }}</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>{{ $mode_of_transaction }} - {{ $agent_id }}</th>
                    <th>{{ $sku_type }}</th>
                    <th>{{ $customer_id }}</th>
                    <th>{{ $principal_id }}</th>
                </tr>
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
                            <input type="hidden" value="{{ $new_sales_order_inventory_quantity[$data->id] }}" name="sales_order_quantity[{{ $data->id }}]">
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
    
    <input type="hidden" name="agent_id" value="{{ $agent_id }}">
    <input type="hidden" name="total_amount" value="{{ array_sum($sum_total) }}">
    <input type="hidden" name="principal_id" value="{{ $principal_id }}">
    <input type="hidden" name="customer_id" value="{{ $customer_id }}">
    <input type="hidden" name="sku_type" value="{{ $sku_type }}">
    <input type="hidden" name="mode_of_transaction" value="{{ $mode_of_transaction }}">
    <button type="submit" class="btn btn-block btn-success">Submit Sales Order</button>
</form>



<script>
    $("#work_flow_no_inventory_save").on('submit', (function(e) {
            e.preventDefault();
            //$('.loading').show();
            $.ajax({
                url: "work_flow_no_inventory_save",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('.loading').hide();
                    
                },
            });
        }));
</script>