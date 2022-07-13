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
                            {{ $data->price_1 }}
                        @elseif($customer_principal_price->price_level == 'price_2')
                            {{ $data->price_2 }}
                        @elseif($customer_principal_price->price_level == 'price_3')
                            {{ $data->price_3 }}
                        @elseif($customer_principal_price->price_level == 'price_4')
                            {{ $data->price_4 }}
                        @endif
                    </td>
                    <td>
                        @php
                            $sub_total = $
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
