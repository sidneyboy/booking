<style>
    #accounts_payable th:first-child,
    #accounts_payable td:first-child {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    }

    /* #accounts_payable th:nth-child(3),
    #accounts_payable td:nth-child(3) {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    } */
</style>
<form id="collection_generate_final_summary">
    <div class="table table-responsive">
        <table class="table table-bordered table-sm" id="accounts_payable">
            <thead>
                <tr>
                    <th>DR</th>
                    <th>Date Delivered</th>
                    <th>Principal</th>
                    <th>Sku Type</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Mode of Payment</th>
                    <th>Amount Paid</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales_register as $data)
                    <tr>
                        <td>{{ $data->dr }}</td>
                        <td>{{ $data->date_delivered }}</td>
                        <td>{{ $data->principal->principal }}</td>
                        <td>{{ $data->sku_type }}</td>
                        <td>{{ $data->status }}</td>
                        <td style="text-align: right">{{ number_format($data->total_amount, 2, '.', ',') }}</td>
                        <td>
                            <select name="sales_register_mode_of_payment[{{ $data->id }}]" style="width:150px"
                                required class="form-control select2">
                                <option value="" default>Select</option>
                                <option value="NO PAYMENT">No Payment</option>
                                <option value="PDC">PDC</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </td>
                        <td>
                            <input type="text"
                                style="text-align: right;    display: block;
                            width: 150px;
                            height: calc(2.25rem + 2px);
                            padding: 0.375rem 0.75rem;
                            font-size: 1rem;
                            font-weight: 400;
                            line-height: 1.5;
                            color: #495057;
                            background-color: #fff;
                            background-clip: padding-box;
                            border: 1px solid #ced4da;
                            border-radius: 0.25rem;
                            box-shadow: inset 0 0 0 transparent;
                            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;"
                                name="sales_register_amount_paid[{{ $data->id }}]" class="currency-default"
                                value="0" required>
                        </td>
                        <td>
                            <input type="hidden" name="sales_register_dr[{{ $data->id }}]" value="{{ $data->dr }}">
                            <input type="hidden" value="{{ $data->total_amount }}" name="sales_register_total_amount[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->sku_type }}" name="sales_register_sku_type[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->principal_id }}" name="sales_register_principal_id[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->principal->principal }}" name="sales_register_principal[{{ $data->id }}]">
                            <input type="text" style="width:150px;"
                                name="sales_register_remarks[{{ $data->id }}]" class="form-control">
                        </td>
                    </tr>
                @endforeach
                @foreach ($sales_order as $data)
                    <tr>
                        <td>No Invoice Yet</td>
                        <td>N/A</td>
                        <td>{{ $data->principal->principal }}</td>
                        <td>{{ $data->sku_type }}</td>
                        <td>{{ $data->status }}</td>
                        <td style="text-align: right">{{ number_format($data->total_amount, 2, '.', ',') }}</td>
                       
                        <td>
                            <select name="sales_order_mode_of_payment[{{ $data->id }}]" style="width:150px"
                                required class="form-control select2">
                                <option value="" default>Select</option>
                                <option value="no_payment">No Payment</option>
                                <option value="pdc">PDC</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </td>
                        <td>
                            <input type="text"
                                style="text-align: right;    display: block;
                            width: 150px;
                            height: calc(2.25rem + 2px);
                            padding: 0.375rem 0.75rem;
                            font-size: 1rem;
                            font-weight: 400;
                            line-height: 1.5;
                            color: #495057;
                            background-color: #fff;
                            background-clip: padding-box;
                            border: 1px solid #ced4da;
                            border-radius: 0.25rem;
                            box-shadow: inset 0 0 0 transparent;
                            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;"
                                name="sales_order_amount_paid[{{ $data->id }}]" class="currency-default"
                                value="0" required>
                        </td>
                        <td>
                            <input type="hidden" value="{{ $data->principal_id }}" name="sales_order_principal_id[{{ $data->id }}]">
                            <input type="text" style="width:150px" name="sales_order_remarks[{{ $data->id }}]"
                                class="form-control">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" value="{{ $customer_id }}" name="customer_id">
    <button type="submit" class="btn btn-info btn-block">PROCEED</button>
</form>


<script>
    $('[class=currency-default]').maskNumber();
    $('[class=currency-data-attributes]').maskNumber();
    $('[class=currency-configuration]').maskNumber({
        decimal: '_',
        thousands: '*'
    });
    $('[class=integer-default]').maskNumber({
        integer: true
    });
    $('[class=integer-data-attribute]').maskNumber({
        integer: true
    });
    $('[class=integer-configuration]').maskNumber({
        integer: true,
        thousands: '_'
    });

    $("#collection_generate_final_summary").on('submit', (function(e) {
        e.preventDefault();
        //$('.loading').show();
        $.ajax({
            url: "collection_generate_final_summary",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                $('#collection_generate_final_summary_page').html(data);
            },
        });
    }));
</script>
