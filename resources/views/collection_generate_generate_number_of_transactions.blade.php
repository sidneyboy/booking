<form id="collection_generate_final_summary">
    <div class="table table-responsive">
        <table class="table table-bordered table-sm" id="accounts_payable">
            <thead>
                <tr>
                    <td rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        DR
                    </td>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Store Name
                    </th>
                    {{-- <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Date Delivered
                    </th> --}}
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Principal
                    </th>
                    <th rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        Sku Type
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
                @foreach ($sales_register_id as $data)
                    @if ($sales_register_number_of_transactions < 1)
                        <tr>
                            <td>{{ $sales_register_dr[$data] }}</td>
                            <td>{{ $sales_register_store_name[$data] }}</td>
                            <td>{{ $sales_register_principal[$data] }}</td>
                            <td>{{ $sales_register_sku_type[$data] }}</td>
                            <td>{{ $sales_register_mode_of_transaction[$data] }}</td>
                            <td>{{ $sales_register_total_amount[$data] }}</td>
                            <td>{{ $sales_register_amount_paid[$data] }}</td>
                            <td>{{ $sales_register_total_bo[$data] }}</td>
                            <td>{{ $sales_register_balance[$data] }}</td>
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
                                    name="sales_register_cash" class="currency-default" value="0" required>
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
                                    name="sales_register_cash_add_refer" class="currency-default" value="0"
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
                                    name="sales_register_cheque" class="currency-default" value="0" required>
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
                                    name="sales_register_cheque_add_refer" class="currency-default" value="0"
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
                                    name="sales_register_cheque_less_refer" class="currency-default" value="0"
                                    required>
                            </td>
                            <td>
                                <input type="text" name="sales_register_specify" style="width: 150px;"
                                    class="form-control">
                            </td>
                            <td>
                                <input type="text" name="sales_register_remarks" style="width: 150px;"
                                    class="form-control">
                            </td>
                        </tr>
                    @else
                        @php
                            $final_sales_register_number_of_transactions = $sales_register_number_of_transactions - 1;
                        @endphp
                        <tr>
                            <td>{{ $sales_register_dr[$data] }}</td>
                            <td>{{ $sales_register_store_name[$data] }}</td>
                            <td>{{ $sales_register_principal[$data] }}</td>
                            <td>{{ $sales_register_sku_type[$data] }}</td>
                            <td>{{ $sales_register_mode_of_transaction[$data] }}</td>
                            <td>{{ $sales_register_total_amount[$data] }}</td>
                            <td>{{ $sales_register_amount_paid[$data] }}</td>
                            <td>{{ $sales_register_total_bo[$data] }}</td>
                            <td>{{ $sales_register_balance[$data] }}</td>
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
                                    name="sales_register_cash[{{ $sales_register_dr[$data] }}]"
                                    class="currency-default" value="0" required>
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
                                    name="sales_register_cash_add_refer[{{ $sales_register_dr[$data] }}]"
                                    class="currency-default" value="0" required>
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
                                    name="sales_register_cheque[{{ $sales_register_dr[$data] }}]"
                                    class="currency-default" value="0" required>
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
                                    name="sales_register_cheque_add_refer[{{ $sales_register_dr[$data] }}]"
                                    class="currency-default" value="0" required>
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
                                    name="sales_register_less_refer[{{ $sales_register_dr[$data] }}]"
                                    class="currency-default" value="0" required>
                            </td>
                            <td>
                                <input type="text" name="sales_register_specify[{{ $sales_register_dr[$data] }}]"
                                    style="width: 150px;" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="sales_register_remarks[{{ $sales_register_dr[$data] }}]"
                                    style="width: 150px;" class="form-control">

                                <input type="hidden"
                                    name="sales_register_store_name[{{ $sales_register_dr[$data] }}]"
                                    value="{{ $sales_register_store_name[$data] }}">
                                <input type="hidden" name="sales_register_balance[{{ $sales_register_dr[$data] }}]"
                                    value="{{ $sales_register_balance[$data] }}">
                                <input type="hidden"
                                    name="sales_register_principal[{{ $sales_register_dr[$data] }}]"
                                    value="{{ $sales_register_principal[$data] }}">
                                <input type="hidden" name="sales_register_sku_type[{{ $sales_register_dr[$data] }}]"
                                    value="{{ $sales_register_sku_type[$data] }}">
                                <input type="hidden"
                                    name="sales_register_mode_of_transaction[{{ $sales_register_dr[$data] }}]"
                                    value="{{ $sales_register_mode_of_transaction[$data] }}">
                                <input type="hidden"
                                    name="sales_register_total_amount[{{ $sales_register_dr[$data] }}]"
                                    value="{{ $sales_register_total_amount[$data] }}">
                                <input type="hidden" name="sales_register_total_bo[{{ $sales_register_dr[$data] }}]"
                                    value="{{ $sales_register_total_bo[$data] }}">
                                <input type="hidden"
                                    name="sales_register_amount_paid[{{ $sales_register_dr[$data] }}]"
                                    value="{{ $sales_register_amount_paid[$data] }}">
                                <input type="hidden" name="sales_register_dr[]"
                                    value="{{ $sales_register_dr[$data] }}">
                                <input type="hidden" name="sales_register_id[]"
                                    value="{{ $sales_register_dr[$data] }}">
                            </td>
                        </tr>
                        @for ($i = 0; $i < $final_sales_register_number_of_transactions; $i++)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

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
                                        name="sales_register_cash_add_refer[{{ $i }}]"
                                        class="currency-default" value="0" required>
                                </td>
                                <td>


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
                                        name="sales_register_cheque_add_refer[{{ $i }}]"
                                        class="currency-default" value="0" required>
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
                                        name="sales_register_less_refer[{{ $i }}]"
                                        class="currency-default" value="0" required>
                                </td>
                                <td>
                                    <input type="text" name="sales_register_specify[{{ $i }}]"
                                        style="width: 150px;" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="sales_register_remarks[{{ $i }}]"
                                        style="width: 150px;" class="form-control">
                                </td>
                            </tr>
                        @endfor
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" value="{{ $customer_id }}" name="customer_id">
    <input type="hidden" value="{{ $sales_register_number_of_transactions }}"
        name="sales_register_number_of_transactions">


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
