<style>
    /* #accounts_payable th:first-child, */
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
                {{-- <tr>
                    <th>Store Name</th>
                    <th>DR</th>
                    <th>Date Delivered</th>
                    <th>Principal</th>
                    <th>Sku Type</th>
                    <th>Status</th>
                    <th>Mode of Payment</th>
                    <th>Amount</th>
                    <th>Amount Paid</th>
                    <th>Current Bo</th>
                    <th>Balance</th>

                    <td colspan="4" width="500px;" style="text-align: center;font-weight:bold;">
                        Commodity Charge
                    </td>


                </tr>
                <tr>
                    <td style=" width:73px">
                        <p style="text-align:center"><span style="font-size:11pt"><strong><span
                                        style="font-size:12.0pt">11-20
                                        m³</span></strong></span></p>
                    </td>
                    <td style=" width:74px">
                        <p style="text-align:center"><span style="font-size:11pt"><strong><span
                                        style="font-size:12.0pt">21-30
                                        m³</span></strong></span></p>
                    </td>
                    <td style=" width:79px">
                        <p style="text-align:center"><span style="font-size:11pt"><strong><span
                                        style="font-size:12.0pt">31-40
                                        m³</span></strong></span></p>
                    </td>
                    <td style=" width:70px">
                        <p style="text-align:center"><span style="font-size:11pt"><strong><span
                                        style="font-size:12.0pt">41-up
                                        m³</span></strong></span></p>
                    </td>
                </tr> --}}
                <tr>
                    <td rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Store Name
                    </td>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        DR
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Date Delivered
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Principal
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Sku Type
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Status
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Mode of Payment
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Amount
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Amount Paid
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Current Bo
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Balance
                    </th>



                    <th colspan="2" width="500px;" style="text-align: center;font-weight:bold;">
                        Cash Collection
                    </th>
                    <th colspan="2" width="500px;" style="text-align: center;font-weight:bold;">
                        Cheque Collection
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Less: Refer
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Specify
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Remarks
                    </th>
                </tr>
                <tr>
                    <th style=" width:73px">
                        <p style="text-align:center"><span style="font-size:11pt"><strong><span
                                        style="font-size:12.0pt">CASH</span></strong></span></p>
                    </th>
                    <th style=" width:74px">
                        <p style="text-align:center"><span style="font-size:11pt"><strong><span
                                        style="font-size:12.0pt">ADD: REFER</span></strong></span></p>
                    </th>
                    <th style=" width:79px">
                        <p style="text-align:center"><span style="font-size:11pt"><strong><span
                                        style="font-size:12.0pt">CHEQUE</span></strong></span></p>
                    </th>
                    <th style=" width:70px">
                        <p style="text-align:center"><span style="font-size:11pt"><strong><span
                                        style="font-size:12.0pt">ADD: REFER</span></strong></span></p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales_register as $data)
                    <tr>
                        <td>{{ $data->customer->store_name }}</td>
                        <td>{{ $data->dr }}</td>
                        <td>{{ $data->date_delivered }}</td>
                        <td>{{ $data->principal->principal }}</td>
                        <td>{{ $data->sku_type }}</td>
                        <td>{{ $data->status }}</td>
                        <td style="text-transform: uppercase">
                            {{ $data->customer->mode_of_transaction }}
                            <input type="hidden" name="sales_register_mode_of_transaction[{{ $data->id }}]"
                                value="{{ $data->customer->mode_of_transaction }}">
                        </td>
                        <td style="text-align: right">{{ number_format($data->total_amount, 2, '.', ',') }}</td>
                        <td style="text-align: right">{{ number_format($data->amount_paid, 2, '.', ',') }}</td>
                        <td style="text-align: right">{{ number_format($data->bad_order->total_bo, 2, '.', ',') }}</td>
                        <td style="text-align: right">
                            @php
                                $sales_register_balance = $data->total_amount - $data->amount_paid - $data->bad_order->total_bo;
                                echo number_format($sales_register_balance, 2, '.', ',');
                            @endphp
                            <input type="hidden" value="{{ $sales_register_balance }}"
                                name="sales_register_balance[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->bad_order->total_bo }}"
                                name="sales_register_total_bo[{{ $data->id }}]">
                        </td>
                        <td>
                            {{-- <input type="text"
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
                                value="0" required> --}}
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
                                name="sales_register_cash[{{ $data->id }}]" class="currency-default" value="0"
                                required>
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
                                name="sales_register_cash_add_refer[{{ $data->id }}]" class="currency-default"
                                value="0" required>
                        </td>
                        <td>
                            {{-- <input type="text"
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
                                value="0" required> --}}
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
                                name="sales_register_cheque[{{ $data->id }}]" class="currency-default"
                                value="0" required>
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
                                name="sales_register_cheque_add_refer[{{ $data->id }}]" class="currency-default"
                                value="0" required>
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
                                name="sales_register_cheque_less_refer[{{ $data->id }}]" class="currency-default"
                                value="0" required>
                        </td>
                        <td>
                            <input type="text" name="sales_register_specify" style="width: 150px;"
                                class="form-control">
                        </td>
                        <td>
                            <input type="hidden" name="" id="sales_register_store_name[{{ $data->id }}}]"
                                value="{{ $data->customer->store_name }}">
                            <input type="hidden" name="sales_register_dr[{{ $data->id }}]"
                                value="{{ $data->dr }}">
                            <input type="hidden" value="{{ $data->total_amount }}"
                                name="sales_register_total_amount[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->sku_type }}"
                                name="sales_register_sku_type[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->principal_id }}"
                                name="sales_register_principal_id[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->principal->principal }}"
                                name="sales_register_principal[{{ $data->id }}]">
                            <input type="text" style="width:150px;"
                                name="sales_register_remarks[{{ $data->id }}]" class="form-control">
                        </td>
                    </tr>
                @endforeach
                @foreach ($sales_order as $data)
                    <tr>
                        <td>{{ $data->customer->store_name }}</td>
                        <td>No Invoice Yet</td>
                        <td>N/A</td>
                        <td>{{ $data->principal->principal }}</td>
                        <td>{{ $data->sku_type }}</td>
                        <td>{{ $data->status }}</td>
                        <td style="text-transform: uppercase">
                            {{ $data->customer->mode_of_transaction }}
                            <input type="hidden" name="sales_order_mode_of_transaction[{{ $data->id }}]"
                                value="{{ $data->customer->mode_of_transaction }}">
                        </td>
                        <td style="text-align: right">{{ number_format($data->total_amount, 2, '.', ',') }}</td>
                        <td style="text-align: right">{{ number_format($data->amount_paid, 2, '.', ',') }}</td>
                        <td style="text-align: right">0.00</td>
                        <td style="text-align: right">
                            @php
                                $sales_order_balance = $data->total_amount - $data->amount_paid;
                                echo number_format($sales_order_balance, 2, '.', ',');
                            @endphp
                            <input type="hidden" name="sales_order_balance[{{ $data->id }}]"
                                value="{{ $sales_order_balance }}">
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
                                name="sales_order_cash[{{ $data->id }}]" class="currency-default" value="0"
                                required>
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
                                name="sales_order_cash_add_refer[{{ $data->id }}]" class="currency-default"
                                value="0" required>
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
                                name="sales_order_cheque[{{ $data->id }}]" class="currency-default"
                                value="0" required>
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
                                name="sales_order_cheque_add_refer[{{ $data->id }}]" class="currency-default"
                                value="0" required>
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
                                name="sales_order_less_refer[{{ $data->id }}]" class="currency-default"
                                value="0" required>
                        </td>
                        <td>
                            <input type="text" name="sales_order_specify" style="width: 150px;"
                                class="form-control">
                        </td>
                        <td>
                            <input type="hidden" name="" id="sales_order_store_name[{{ $data->id }}]"
                                value="{{ $data->customer->store_name }}">
                            <input type="hidden" value="{{ $data->principal_id }}"
                                name="sales_order_principal_id[{{ $data->id }}]">
                            <input type="text" style="width:150px"
                                name="sales_order_remarks[{{ $data->id }}]" class="form-control">
                            <input type="hidden" value="{{ $data->total_amount }}"
                                name="sales_order_total_amount[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->sku_type }}"
                                name="sales_order_sku_type[{{ $data->id }}]">
                            <input type="hidden" value="{{ $data->principal->principal }}"
                                name="sales_order_principal[{{ $data->id }}]">
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
