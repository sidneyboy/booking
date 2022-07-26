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
<form id="#">
    <div class="table table-responsive">
        <table class="table table-bordered table-sm" id="final_summary">
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
                @foreach ($sales_register_dr as $data)
                    @if ($sales_register_number_of_transactions < 1)
                        <tr>
                            <td>{{ $data }}</td>
                        </tr>
                    @else
                        
                        <tr>
                            <td>{{ $data }}</td>
                            <td>{{ $sales_register_store_name[$data] }}</td>
                            <td>{{ $sales_register_principal[$data] }}</td>
                            <td>{{ $sales_register_sku_type[$data] }}</td>
                            <td>{{ $sales_register_mode_of_transaction[$data] }}</td>
                            <td>{{ $sales_register_total_amount[$data] }}</td>
                            <td>{{ $sales_register_amount_paid[$data] }}</td>
                            <td>{{ $sales_register_total_bo[$data] }}</td>
                            <td>{{ $sales_register_balance[$data] }}</td>
                            <td>{{ $sales_register_cash[$data] }}</td>
                            <td>{{ $sales_register_cash_add_refer[$data] }}</td>
                            <td>{{ $sales_register_cheque[$data] }}</td>
                            <td>{{ $sales_register_cheque_add_refer[$data] }}</td>
                            <td>{{ $sales_register_less_refer[$data] }}</td>
                            <td>{{ $sales_register_specify[$data] }}</td>
                            <td>{{ $sales_register_remarks[$data] }}</td>
                        </tr>
                        @php
                            $final_sales_register_number_of_transactions = $sales_register_number_of_transactions - 1;
                        @endphp
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
                                <td></td>
                                <td>
                                    {{ $sales_register_cash_add_refer[$i] }}
                                </td>
                                <td></td>
                                <td>{{ $sales_register_cheque_add_refer[$i] }}</td>
                                <td>{{ $sales_register_less_refer[$i] }}</td>
                                <td>{{ $sales_register_specify[$i] }}</td>
                                <td>{{ $sales_register_remarks[$i] }}</td>
                            </tr>
                        @endfor
                    @endif
                @endforeach
            </tbody>
        </table>
</form>

{{-- <script>
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
                if (data == 'saved') {
                    Swal.fire(
                        'Successfully Submitted Collection',
                        'Redirecting To Work Flow',
                        'success'
                    );

                    window.location.href = "/collection_export";
                } else {
                    Swal.fire(
                        'Uploaded file must be an image',
                        'Cannot Proceed',
                        'error'
                    );
                }
            },
        });
    }));
</script> --}}
