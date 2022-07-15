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
                    <th>Mode of Payment</th>
                    <th>Amount Paid</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales_register_amount_paid as $key => $sales_register_payment_data)
                    @if ($sales_register_payment_data == $sales_register_total_amount[$key])
                        @php
                            $trigger_not_balance[] = 0;
                        @endphp
                        <tr>
                            <td>{{ $sales_register_dr[$key] }}</td>
                            <td>{{ $sales_register_principal[$key] }}</td>
                            <td>{{ $sales_register_sku_type[$key] }}</td>
                            <td style="color:green;font-weight:bold;">
                                {{ number_format($sales_register_total_amount[$key], 2, '.', ',') }}</td>
                            <td>{{ $sales_register_mode_of_payment[$key] }}</td>
                            <td style="color:green;font-weight:bold;">
                                {{ number_format($sales_register_payment_data, 2, '.', ',') }}</td>
                            <td>{{ $sales_register_remarks[$key] }}</td>
                        </tr>
                    @else
                        @php
                            $trigger_not_balance[] = 1;
                        @endphp
                        <tr>
                            <td>{{ $sales_register_dr[$key] }}</td>
                            <td>{{ $sales_register_principal[$key] }}</td>
                            <td>{{ $sales_register_sku_type[$key] }}</td>
                            <td style="color:red;font-weight:bold;">
                                {{ number_format($sales_register_total_amount[$key], 2, '.', ',') }}</td>
                            <td>{{ $sales_register_mode_of_payment[$key] }}</td>
                            <td style="color:red;font-weight:bold;">
                                {{ number_format($sales_register_payment_data, 2, '.', ',') }}</td>
                            <td>{{ $sales_register_remarks[$key] }}</td>
                        </tr>
                    @endif
                    <input type="hidden" value="{{ $key }}" name="sales_register_id[]">
                @endforeach
            </tbody>
        </table>
    </div>

    @if (array_sum($trigger_not_balance) != 0)
        <center>
            <h5 style="color:red;">Wala nag balanse</h5>
        </center>
    @else
        <button type="submit" class="btn btn-block btn-success">SUBMIT</button>
    @endif
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
