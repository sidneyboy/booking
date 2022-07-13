<style>
    #table_suggested_so th:first-child,
    #table_suggested_so td:first-child {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    }
</style>

<form id="work_flow_final_summary">
    @csrf
    <div class="table table-responsive">
        <table class="table table-bordered table-sm" id="table_suggested_so">
            <thead>
                <tr>
                    <th colspan="9">
                        <select name="mode_of_transaction" class="form-control" required style="width:100%">
                            <option value="" default>Select Mode of Transaction</option>
                            <option value="COD">COD</option>
                            <option value="PDC">PDC</option>
                            <option value="VALE">VALE</option>
                        </select>
                    </th>
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
                                $suggested_sales_order = $average_daily_sales * ($number_of_days + 5) + $current_bo[$current_inventory_data];
                                echo $suggested_sales_order;
                            @endphp
                        </td>
                        <td>
                            <input type="hidden" name="sales_order_final_inventory_id[]"
                                value="{{ $current_inventory_data }}">
                            <input type="hidden"
                                name="sales_order_final_inventory_description[{{ $current_inventory_data }}]"
                                value="{{ $current_inventory_description[$current_inventory_data] }}">

                            <input type="number" style="width:100px;text-align:right" min="0"
                                class="form-control" required value="{{ $suggested_sales_order }}"
                                name="sales_order_final_quantity[{{ $current_inventory_data }}]">
                        </td>
                    </tr>
                @endforeach
                @foreach ($new_sales_order_inventory_quantity as $new_sales_order_inventory_id => $new_sales_order_data)
                    <tr>
                        <td>{{ $new_sales_order_inventory_description[$new_sales_order_inventory_id] }}</td>
                        <td style="text-align:right">0</td>
                        <td style="text-align:right">0</td>
                        <td style="text-align:right">0</td>
                        <td style="text-align:right">0</td>
                        <td style="text-align:right">0</td>
                        <td style="text-align:right">0</td>
                        <td style="text-align:right">0</td>
                        <td>
                            <input type="hidden"
                                name="sales_order_final_inventory_description[{{ $new_sales_order_inventory_id }}]"
                                value="{{ $new_sales_order_inventory_description[$new_sales_order_inventory_id] }}">
                            <input type="hidden" name="sales_order_final_inventory_id[]"
                                value="{{ $new_sales_order_inventory_id }}">
                            <input type="number" style="width:100px;text-align:right"
                                name="sales_order_final_quantity[{{ $new_sales_order_inventory_id }}]" min="0"
                                value="{{ $new_sales_order_data }}" class="form-control" required>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" value="{{ $customer_id }}" name="customer_id">
    <input type="hidden" value="{{ $principal_id }}" name="principal_id">
    <input type="hidden" value="{{ $sku_type }}" name="sku_type">
    <button type="submit" class="btn btn-block btn-info">PROCEED TO FINAL SUMMARY</button>
</form>

<script>
    $("#work_flow_final_summary").on('submit', (function(e) {
        e.preventDefault();
        //$('.loading').show();
        $.ajax({
            url: "work_flow_final_summary",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                $('#work_flow_final_summary_page').html(data);
            },
        });
    }));
</script>
