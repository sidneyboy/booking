<div class="table table-responsive">
    <table class="table table-bordered table-sm">
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
                    <td>{{ $data->description }}</td>
                    <td style="text-align: right">{{ $sales_order_final_quantity[$data->id] }}</td>
                    <td style="text-align: right">
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
                    </td>
                    <td style="text-align: right">
                        @php
                            $sub_total = $unit_price * $sales_order_final_quantity[$data->id];
                            echo number_format($sub_total, 2, '.', ',');
                            $sum_total[] = $sub_total;
                        @endphp
                    </td>
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
