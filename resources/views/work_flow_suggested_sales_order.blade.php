<div class="table table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th colspan="4">PREV DELIVERY RECEIPT: {{ $sales_register->dr }}</th>
            </tr>
            <tr>
                <th>Desc</th>
                <th>Qty</th>
                <th>U/P</th>
                <th>Sub</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales_register->sales_register_details as $data)
                <tr>
                    <td>
                        {{ $data->inventory->description }}
                        <br />
                        {{ $data->sku_type }}
                    </td>
                    <td style="text-align: right">{{ $data->delivered_quantity }}</td>
                    <td style="text-align: right">{{ number_format($data->unit_price, 2, '.', ',') }}</td>
                    <td style="text-align: right">
                        @php
                            $sub_total = $data->unit_price * $data->delivered_quantity;
                            $sum_total[] = $sub_total;
                            echo number_format($sub_total, 2, '.', ',');
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">TOTAL</td>
                <td style="text-align: right">{{ number_format(array_sum($sum_total), 2, '.', ',') }}</td>
            </tr>
        </tfoot>
    </table>

    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th colspan="4">SUGGESTED SO</th>
            </tr>
            <tr>
                <th>Desc</th>
                <th>Qty</th>
                <th>U/P</th>
                <th>Sub</th>
            </tr>
        </thead>
        <tbody>
          @foreach ( as )
                    
          @endforeach
        </tbody>
    </table>
</div>
