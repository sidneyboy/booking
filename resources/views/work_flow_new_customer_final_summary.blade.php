<form id="work_flow_new_customer_saved">
    <div class="table table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Desc</th>
                    <th>Qty</th>
                    <th>U/P</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventory_data as $data)
                    <tr>
                        <td>{{ $data->sku_code }} - {{ $data->description }}</td>
                        <td>{{ $new_sales_order[$data->id] }}</td>
                        <td>
                            @if ($price_level == 'price_1')
                                @php
                                    $unit_price = $data->price_1;
                                @endphp
                                {{ number_format($data->price_1, 2, '.', ',') }}
                            @elseif($price_level == 'price_2')
                                @php
                                    $unit_price = $data->price_2;
                                @endphp
                                {{ number_format($data->price_2, 2, '.', ',') }}
                            @elseif($price_level == 'price_3')
                                @php
                                    $unit_price = $data->price_3;
                                @endphp
                                {{ number_format($data->price_3, 2, '.', ',') }}
                            @elseif($price_level == 'price_4')
                                @php
                                    $unit_price = $data->price_4;
                                @endphp
                                {{ number_format($data->price_4, 2, '.', ',') }}
                            @endif
                        </td>
                        <td>
                            {{ number_format($unit_price * $new_sales_order[$data->id], 2, '.', ',') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="text" name="principal_id" value="{{ $principal_id }}">
    <input type="text" name="sku_type" value="{{ $sku_type }}">
    <button class="btn btn-success btn-block">Submit</button>
</form>


<script>
    $("#work_flow_new_customer_saved").on('submit', (function(e) {
        e.preventDefault();
        //$('.loading').show();
        $.ajax({
            url: "work_flow_new_customer_saved",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                // if (data == "saved") {
                //     Swal.fire({
                //         position: 'top-end',
                //         icon: 'success',
                //         title: 'Your work has been saved',
                //         showConfirmButton: false,
                //         timer: 1500
                //     });
                //     window.location.href = "/collection";
                // } else {
                //     alert('asdasd');
                // }

            },
        });
    }));
</script>
