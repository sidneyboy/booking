<style>
    #final_summary td:first-child {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    }

    /* #final_summary th:nth-child(3),
    #final_summary td:nth-child(3) {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    } */
</style>
<form id="collection_save">
    <div class="table table-responsive">
        <table class="table table-bordered table-sm" id="final_summary">
            <thead>
                <tr>
                    <td rowspan="2" style="vertical-align: middle;font-weight:bold;text-align:center">
                        OR No
                    </td>
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
                        Balance
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

                @foreach ($sales_register_dr as $data)
                    @if ($sales_register_number_of_transactions[$data] < 1)
                        <tr>
                            <td>{{ $data }}</td>
                        </tr>
                    @else
                        @php
                            $total = $sales_register_total_amount[$data];
                            $discount_holder = [];
                            $discount_value_holder = $total;
                        @endphp
                        <tr>
                            <td>
                                {{ $sales_register_or_number[$data] }}
                                <input type="hidden" value="{{ $sales_register_or_number[$data] }}"
                                    name="sales_register_or_number[{{ $data }}]">
                            </td>
                            <td>
                                {{ $data }}
                                <input type="hidden" value="{{ $data }}" name="sales_register_dr[]">
                                <input type="hidden" value="{{ $sales_register_store_name[$data] }}"
                                    name="sales_register_store_name[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_principal[$data] }}"
                                    name="sales_register_principal[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_sku_type[$data] }}"
                                    name="sales_register_sku_type[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_mode_of_transaction[$data] }}"
                                    name="sales_register_mode_of_transaction[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_total_amount[$data] }}"
                                    name="sales_register_total_amount[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_amount_paid[$data] }}"
                                    name="sales_register_amount_paid[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_total_bo[$data] }}"
                                    name="sales_register_total_bo[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_balance[$data] }}"
                                    name="sales_register_balance[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_number_of_transactions[$data] }}"
                                    name="sales_register_number_of_transactions[{{ $data }}]">


                                <input type="hidden" value="{{ $sales_register_cash[$data] }}"
                                    name="sales_register_cash[{{ $data }}]">
                                <input type="hidden" value="{{ $sales_register_cash_add_refer[$data] }}"
                                    name="sales_register_cash_add_refer[{{ $data }}]">

                                <input type="hidden" value="{{ $sales_register_cheque[$data] }}"
                                    name="sales_register_cheque[{{ $data }}]">

                                <input type="hidden" value="{{ $sales_register_cheque_add_refer[$data] }}"
                                    name="sales_register_cheque_add_refer[{{ $data }}]">

                                <input type="hidden" value="{{ $sales_register_less_refer[$data] }}"
                                    name="sales_register_less_refer[{{ $data }}]">

                                <input type="hidden" value="{{ $sales_register_specify[$data] }}"
                                    name="sales_register_specify[{{ $data }}]">

                                <input type="hidden" value="{{ $sales_register_remarks[$data] }}"
                                    name="sales_register_remarks[{{ $data }}]">


                            </td>
                            <td>{{ $sales_register_store_name[$data] }}</td>
                            <td>{{ $sales_register_principal[$data] }}</td>
                            <td>{{ $sales_register_sku_type[$data] }}</td>
                            <td>{{ $sales_register_mode_of_transaction[$data] }}</td>
                            <td>{{ $sales_register_total_amount[$data] }}</td>
                            <td>{{ $sales_register_amount_paid[$data] }}</td>
                            <td>{{ $sales_register_total_bo[$data] }}</td>
                            <td>{{ $sales_register_balance[$data] }}</td>
                            <td>
                                {{ $sales_register_cash[$data] }}
                                @php
                                    $total_sales_register_cash[] = $sales_register_cash[$data];
                                @endphp
                            </td>
                            <td>
                                {{ $sales_register_cash_add_refer[$data] }}
                                @php
                                    $total_sales_register_cash_add_refer[] = $sales_register_cash_add_refer[$data];
                                @endphp
                            </td>
                            <td>
                                {{ $sales_register_cheque[$data] }}
                                @php
                                    $total_sales_register_cheque[] = $sales_register_cheque[$data];
                                @endphp
                            </td>
                            <td>
                                {{ $sales_register_cheque_add_refer[$data] }}
                                @php
                                    $total_sales_register_cheque_add_refer[] = $sales_register_cheque_add_refer[$data];
                                @endphp
                            </td>
                            <td>
                                {{ $sales_register_less_refer[$data] }}
                                @php
                                    $total_sales_register_less_refer[] = $sales_register_less_refer[$data];
                                @endphp
                            </td>
                            <td>
                                @php
                                    $discount_value_holder_dummy = $discount_value_holder;
                                    
                                    $discount_value_holder = $sales_register_balance[$data]  - $sales_register_cash[$data] - $sales_register_cash_add_refer[$data] - $sales_register_cheque[$data] - $sales_register_cheque_add_refer[$data] + $sales_register_less_refer[$data];;
                                    $discount_holder[] = $discount_value_holder;
                                    echo number_format($discount_value_holder, 2, '.', ',');
                                    
                                @endphp
                                <input type="hidden" name="sales_register_updated_balance[{{ $data }}]" value="{{ $discount_value_holder }}">
                            </td>
                            <td>{{ $sales_register_specify[$data] }}</td>
                            <td>{{ $sales_register_remarks[$data] }}</td>
                        </tr>
                        @php
                            $final_sales_register_number_of_transactions = $sales_register_number_of_transactions[$data] - 1;
                        @endphp
                        @for ($i = 0; $i < $final_sales_register_number_of_transactions; $i++)
                            @php
                                $total_2 = array_sum($discount_holder);
                                $discount_holder_2 = [];
                                $discount_value_holder_2 = $total_2;
                            @endphp
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
                                <td></td>
                                <td></td>

                                <td>
                                    {{ $lower_sales_register_cash_add_refer[$data . '-' . $i] }}
                                    @php
                                        $total_lower_sales_register_cash_add_refer[$data] = $lower_sales_register_cash_add_refer[$data . '-' . $i];
                                    @endphp
                                </td>
                                <td></td>
                                <td>
                                    {{ $lower_sales_register_cheque_add_refer[$data . '-' . $i] }}
                                    @php
                                        $total_lower_sales_register_cheque_add_refer[$data] = $lower_sales_register_cheque_add_refer[$data . '-' . $i];
                                    @endphp
                                </td>
                                <td>
                                    {{ $lower_sales_register_less_refer[$data . '-' . $i] }}
                                    @php
                                        $total_lower_sales_register_less_refer[$data] = $lower_sales_register_less_refer[$data . '-' . $i];
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $discount_value_holder_dummy_2 = $discount_value_holder_2;
                                        
                                        $discount_value_holder_2 = $discount_value_holder_dummy_2 - $lower_sales_register_cash_add_refer[$data ."-". $i] - $lower_sales_register_cheque_add_refer[$data ."-". $i] + $lower_sales_register_less_refer[$data ."-". $i];
                                        $discount_holder_2[] = $discount_value_holder_2;
                                        echo number_format($discount_value_holder_2, 2, '.', ',');
                                    @endphp
                                     <input type="hidden" name="lower_sales_register_updated_balance[{{ $data ."-". $i }}]" value="{{ $discount_value_holder_2 }}">
                                </td>
                                <td>{{ $lower_sales_register_specify[$data . '-' . $i] }}</td>
                                <td>
                                    {{ $lower_sales_register_remarks[$data . '-' . $i] }}

                                    <input type="hidden"
                                        value="{{ $lower_sales_register_cash_add_refer[$data . '-' . $i] }}"
                                        name="lower_sales_register_cash_add_refer[{{ $data . '-' . $i }}]">
                                    <input type="hidden"
                                        value="{{ $lower_sales_register_cheque_add_refer[$data . '-' . $i] }}"
                                        name="lower_sales_register_cheque_add_refer[{{ $data . '-' . $i }}]">

                                    <input type="hidden"
                                        value="{{ $lower_sales_register_less_refer[$data . '-' . $i] }}"
                                        name="lower_sales_register_less_refer[{{ $data . '-' . $i }}]">

                                    <input type="hidden"
                                        value="{{ $lower_sales_register_specify[$data . '-' . $i] }}"
                                        name="lower_sales_register_specify[{{ $data . '-' . $i }}]">

                                    <input type="hidden"
                                        value="{{ $lower_sales_register_remarks[$data . '-' . $i] }}"
                                        name="lower_sales_register_remarks[{{ $data . '-' . $i }}]">


                                </td>
                            </tr>
                        @endfor
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10">TOTAL</th>
                    <th>{{ array_sum($total_sales_register_cash) }}</th>
                    <th>{{ array_sum($total_sales_register_cash_add_refer) + array_sum($total_lower_sales_register_cash_add_refer) }}
                    </th>
                    <th>{{ array_sum($total_sales_register_cheque)}}</th>
                    <th>{{ array_sum($total_sales_register_cheque_add_refer)  + array_sum($total_lower_sales_register_cheque_add_refer) }}</th>
                    <th>{{ array_sum($total_sales_register_less_refer) + array_sum($total_lower_sales_register_less_refer) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <input type="hidden" name="customer_id" value="{{ $customer_id }}">
    <button type="submit" class="btn btn-block btn-success">Submit</button>
</form>

<script>
    $("#collection_save").on('submit', (function(e) {
        e.preventDefault();
        //$('.loading').show();
        $.ajax({
            url: "collection_save",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                // if (data == 'saved') {
                //     Swal.fire(
                //         'Successfully Submitted Collection',
                //         'Redirecting To Work Flow',
                //         'success'
                //     );

                //     window.location.href = "/collection_export";
                // } else {
                //     Swal.fire(
                //         'Uploaded file must be an image',
                //         'Cannot Proceed',
                //         'error'
                //     );
                // }
            },
        });
    }));
</script>
