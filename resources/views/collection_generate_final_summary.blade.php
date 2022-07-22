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
<form id="collection_save" enctype="multipart/form-data">
    @if ($checker == 'sales_register')
        <div class="table table-responsive">
            <table class="table table-bordered table-sm" id="accounts_payable">
                <thead>
                    <tr>
                        <th>DR</th>
                        <th>Principal</th>
                        <th>Sku Type</th>
                        <th>Mode of Transaction</th>
                        <th>Balance</th>
                        <th>Payment</th>
                        <th>Balance</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales_register_amount_paid as $key => $sales_register_payment_data)
                        <tr>
                            <td>{{ $sales_register_dr[$key] }}</td>
                            <td>{{ $sales_register_principal[$key] }}</td>
                            <td>{{ $sales_register_sku_type[$key] }}</td>
                            <td style="text-transform: uppercase">{{ $sales_register_mode_of_transaction[$key] }}</td>
                            <td style="text-align:right">
                                {{ number_format($sales_register_balance[$key], 2, '.', ',') }}</td>
                            <td style="text-align:right">
                                {{ number_format($sales_register_payment_data, 2, '.', ',') }}</td>
                            <td style="text-align:right">
                                @php
                                    $balance = $sales_register_balance[$key] - $sales_register_payment_data;
                                    echo number_format($balance, 2, '.', ',');
                                @endphp
                            </td>
                            <td>
                                {{ $sales_register_remarks[$key] }}

                                <input type="hidden" value="{{ $sales_register_remarks[$key] }}"
                                    name="sales_register_remarks[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_principal[$key] }}"
                                    name="sales_register_principal[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_total_amount[$key] }}"
                                    name="sales_register_total_amount[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_balance[$key] }}"
                                    name="sales_register_balance[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_payment_data }}"
                                    name="sales_register_payment_data[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_mode_of_transaction[$key] }}"
                                    name="sales_register_mode_of_transaction[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_dr[$key] }}"
                                    name="sales_register_dr[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_sku_type[$key] }}"
                                    name="sales_register_sku_type[{{ $key }}]">
                                <input type="hidden" value="{{ $balance }}"
                                    name="sales_register_balance[{{ $key }}]">
                            </td>
                        </tr>
                        <input type="hidden" value="{{ $key }}" name="sales_register_id[]">
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif ($checker == 'sales_order')
        <div class="table table-responsive">
            <table class="table table-bordered table-sm" id="accounts_payable">
                <thead>
                    <tr>
                        <th>DR</th>
                        <th>Principal</th>
                        <th>Sku Type</th>
                        <th>Mode of Transaction</th>
                        <th>Balance</th>
                        <th>Payment</th>
                        <th>Balance</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales_order_amount_paid as $key => $sales_order_amount_paid)
                        <tr>
                            <td>No Invoice Yet</td>
                            <td>{{ $sales_order_principal[$key] }}</td>
                            <td>{{ $sales_order_sku_type[$key] }}</td>
                            <td style="text-transform: uppercase">{{ $sales_order_mode_of_transaction[$key] }}</td>
                            <td style="text-align:right">
                                {{ number_format($sales_order_balance[$key], 2, '.', ',') }}</td>
                            <td style="text-align:right">
                                {{ number_format($sales_order_amount_paid, 2, '.', ',') }}</td>
                            <td style="text-align:right">
                                @php
                                    $balance = $sales_order_balance[$key] - $sales_order_amount_paid;
                                    echo number_format($balance, 2, '.', ',');
                                @endphp
                            </td>
                            <td>
                                {{ $sales_order_remarks[$key] }}
                                <input type="hidden" value="{{ $sales_order_remarks[$key] }}"
                                    name="sales_order_remarks[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_principal[$key] }}"
                                    name="sales_order_principal[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_total_amount[$key] }}"
                                    name="sales_order_total_amount[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_amount_paid }}"
                                    name="sales_order_amount_paid[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_balance[$key] }}"
                                    name="sales_order_balance[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_mode_of_transaction[$key] }}"
                                    name="sales_order_mode_of_transaction[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_sku_type[$key] }}"
                                    name="sales_order_sku_type[{{ $key }}]">
                                <input type="hidden" value="{{ $balance }}"
                                    name="sales_order_balance[{{ $key }}]">
                                <input type="hidden" value="{{ $key }}" name="sales_order_id[]">
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @elseif($checker == 'both')
        asdasd
        {{-- <div class="table table-responsive">
            <table class="table table-bordered table-sm" id="accounts_payable">
                <thead>
                    <tr>
                        <th>DR</th>
                        <th>Principal</th>
                        <th>Sku Type</th>
                        <th>Mode of Transaction</th>
                        <th>Balance</th>
                        <th>Payment</th>
                        <th>Balance</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales_register_amount_paid as $key => $sales_register_payment_data)
                        <tr>
                            <td>{{ $sales_register_dr[$key] }}</td>
                            <td>{{ $sales_register_principal[$key] }}</td>
                            <td>{{ $sales_register_sku_type[$key] }}</td>
                            <td style="text-transform: uppercase">{{ $sales_register_mode_of_transaction[$key] }}</td>
                            <td style="text-align:right">
                                {{ number_format($sales_register_balance[$key], 2, '.', ',') }}</td>
                            <td style="text-align:right">
                                {{ number_format($sales_register_payment_data, 2, '.', ',') }}</td>
                            <td style="text-align:right">
                                @php
                                    $balance = $sales_register_balance[$key] - $sales_register_payment_data;
                                    echo number_format($balance, 2, '.', ',');
                                @endphp
                            </td>
                            <td>
                                {{ $sales_register_remarks[$key] }}

                                <input type="hidden" value="{{ $sales_register_remarks[$key] }}"
                                    name="sales_register_remarks[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_principal[$key] }}"
                                    name="sales_register_principal[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_total_amount[$key] }}"
                                    name="sales_register_total_amount[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_balance[$key] }}"
                                    name="sales_register_balance[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_payment_data }}"
                                    name="sales_register_payment_data[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_mode_of_transaction[$key] }}"
                                    name="sales_register_mode_of_transaction[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_dr[$key] }}"
                                    name="sales_register_dr[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_register_sku_type[$key] }}"
                                    name="sales_register_sku_type[{{ $key }}]">
                                <input type="hidden" value="{{ $balance }}"
                                    name="sales_register_balance[{{ $key }}]">
                            </td>
                        </tr>
                        <input type="hidden" value="{{ $key }}" name="sales_register_id[]">
                    @endforeach
                    @foreach ($sales_order_amount_paid as $key => $sales_order_amount_paid)
                        <tr>
                            <td>No Invoice Yet</td>
                            <td>{{ $sales_order_principal[$key] }}</td>
                            <td>{{ $sales_order_sku_type[$key] }}</td>
                            <td style="text-transform: uppercase">{{ $sales_order_mode_of_transaction[$key] }}</td>
                            <td style="text-align:right">
                                {{ number_format($sales_order_balance[$key], 2, '.', ',') }}</td>
                            <td style="text-align:right">
                                {{ number_format($sales_order_amount_paid, 2, '.', ',') }}</td>
                            <td style="text-align:right">
                                @php
                                    $balance = $sales_order_balance[$key] - $sales_order_amount_paid;
                                    echo number_format($balance, 2, '.', ',');
                                @endphp
                            </td>
                            <td>
                                {{ $sales_order_remarks[$key] }}
                                <input type="hidden" value="{{ $sales_order_remarks[$key] }}"
                                    name="sales_order_remarks[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_principal[$key] }}"
                                    name="sales_order_principal[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_total_amount[$key] }}"
                                    name="sales_order_total_amount[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_amount_paid }}"
                                    name="sales_order_amount_paid[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_balance[$key] }}"
                                    name="sales_order_balance[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_mode_of_transaction[$key] }}"
                                    name="sales_order_mode_of_transaction[{{ $key }}]">
                                <input type="hidden" value="{{ $sales_order_sku_type[$key] }}"
                                    name="sales_order_sku_type[{{ $key }}]">
                                <input type="hidden" value="{{ $balance }}"
                                    name="sales_order_balance[{{ $key }}]">
                                <input type="hidden" value="{{ $key }}" name="sales_order_id[]">
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div> --}}
    @endif

    <br />
    <input type="hidden" value="{{ $customer_id }}" name="customer_id">
    <button type="submit" class="btn btn-block btn-success">SUBMIT</button>
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
</script>
