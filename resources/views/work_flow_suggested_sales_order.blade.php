<div class="table table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th colspan="9">SUGGESTED SO</th>
            </tr>
            <tr>
                <th>Desc</th>
                <th>Delivered Inventory</th>
                <th>Current Inventory</th>

                <th>Sales/Offtake</th>
                <th>No. of Days</th>

                <th>Average Daily Sales</th>
                <th>Current Bo</th>
                <th>Suggested Sales Order</th>
                <th>Final SO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($current_inventory_id as $current_inventory_data)
                <tr>
                    <td>{{ $current_inventory_description[$current_inventory_data] }}</td>
                    <td style="text-align: right">
                        {{ $prev_delivered_inventory[$current_inventory_data] }}
                    </td>
                    <td style="text-align: right">
                        {{ $current_remaining_inventory[$current_inventory_data] }}
                    </td>
                    <td style="text-align: right">
                        @php
                            $sales_off_take = $prev_delivered_inventory[$current_inventory_data] - $current_remaining_inventory[$current_inventory_data];
                            echo $sales_off_take;
                        @endphp
                    </td>
                    <td style="text-align: right">
                        @php
                            $diff = abs(strtotime($date_delivered) - strtotime($date));
                            $years = floor($diff / (365 * 60 * 60 * 24));
                            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                            echo $number_of_days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                        @endphp
                    </td>
                    <td style="text-align: right">
                        @php
                            echo $average_daily_sales = round($sales_off_take / $number_of_days);
                        @endphp
                    </td>
                    <td style="text-align: right">
                        {{ $current_bo[$current_inventory_data] }}
                    </td>
                    <td style="text-align: right">
                        @php
                            $suggested_sales_order = ($average_daily_sales * ($number_of_days + 5)) + $current_bo[$current_inventory_data];
                            echo $suggested_sales_order;
                        @endphp
                    </td>
                    <td>
                        <input type="number" style="width:100px;text-align:right" min="0" value="0" class="form-control" required>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
