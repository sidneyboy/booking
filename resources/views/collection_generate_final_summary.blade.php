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
<form id="collection_save">
    <div class="table table-responsive">
        <table class="table table-bordered table-sm" id="accounts_payable">
            <thead>
                <tr>
                    <th>DR</th>
                    <th>Principal</th>
                    <th>Sku Type</th>
                    <th>Amount</th>
                    <th>Mode of Transaction</th>
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
                            {{ number_format($sales_register_total_amount[$key], 2, '.', ',') }}</td>
                        <td style="text-align:right">
                            {{ number_format($sales_register_payment_data, 2, '.', ',') }}</td>
                        <td style="text-align:right">
                            @php
                                $balance = $sales_register_total_amount[$key] - $sales_register_payment_data;
                                echo number_format($balance, 2, '.', ',');
                            @endphp
                        </td>
                        <td>{{ $sales_register_remarks[$key] }}</td>
                    </tr>
                    <input type="hidden" value="{{ $key }}" name="sales_register_id[]">
                @endforeach
                @foreach ($sales_order_amount_paid as $key => $sales_order_amount_paid)
                    <td>No Invoice Yet</td>
                    <td>{{ $sales_order_principal[$key] }}</td>
                    <td>{{ $sales_order_sku_type[$key] }}</td>
                    <td style="text-transform: uppercase">{{ $sales_order_mode_of_transaction[$key] }}</td>
                    <td style="text-align:right">
                        {{ number_format($sales_order_total_amount[$key], 2, '.', ',') }}</td>
                    <td style="text-align:right">
                        {{ number_format($sales_order_amount_paid, 2, '.', ',') }}</td>
                    <td style="text-align:right">
                        @php
                            $balance = $sales_order_total_amount[$key] - $sales_order_amount_paid;
                            echo number_format($balance, 2, '.', ',');
                        @endphp
                    </td>
                    <td>{{ $sales_order_remarks[$key] }}</td>
                @endforeach
            </tbody>
        </table>
    </div>

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

                    window.location.href = "/work_flow";
                }
            },
        });
    }));
</script>
