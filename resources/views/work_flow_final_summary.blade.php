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
    </thead>
</table>
<table class="table table-bordered table-sm" style="font-size: 17px;font-family: Arial, Helvetica, sans-serif;">
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
                <th style="text-align: right">{{ $sales_order_final_quantity[$data->id] }}</th>
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
                </th>
                <th style="text-align: right">
                    @php
                        $sub_total = $unit_price * $sales_order_final_quantity[$data->id];
                        echo number_format($sub_total, 2, '.', ',');
                        $sum_total[] = $sub_total;
                    @endphp
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
