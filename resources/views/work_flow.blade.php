@extends('layouts.master')

@section('title', 'WORK FLOW')

@section('navbar')


@section('sidebar')


@section('content')

    <br />
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-weight: bold;">WORK FLOW</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                @if ($sales_order_check == 0)
                    <form id="work_flow_show_inventory">
                        <div class="form-group">
                            <label>Customer</label>
                            <select name="customer" id="customer" class="form-control select2" required
                                style="width:100%;">
                                <option value="" default>Select</option>
                                @foreach ($customer as $data)
                                    <option value="{{ $data->id }}">{{ $data->store_name }}</option>
                                @endforeach
                            </select>

                            <label>Principal</label>
                            <select name="principal" id="principal" class="form-control select2" required
                                style="width:100%;">
                                <option value="" default>Select</option>
                                @foreach ($principal as $data)
                                    <option value="{{ $data->id }}">{{ $data->principal }}</option>
                                @endforeach
                            </select>

                            <label>Type</label>
                            <select name="sku_type" id="sku_type" class="form-control select2" required
                                style="width:100%;">
                                <option value="" default>Select</option>
                                <option value="BUTAL">BUTAL</option>
                                <option value="CASE">CASE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block" id="proceed"
                                style="display: none">PROCEED</button>
                        </div>
                    </form>
                @else
                    CANNOT TRANSACT PLEASE EXPORT THE PREVIOUS SO AND SEND TO ENCODER THANK YOU.
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div id="work_flow_show_inventory_page"></div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-weight: bold;">GENERATE DATA</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div id="work_flow_suggested_sales_order_page"></div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-weight: bold;">FINAL SUMMARY</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div id="work_flow_final_summary_page"></div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection


@section('footer')
    @parent
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#customer").change(function(e) {
            e.preventDefault();
            //$('.loading').show();
            customer = $('#customer').val();
            $.post({
                type: "POST",
                url: "/work_flow_check_customer_sales_order_status",
                data: 'customer=' + customer,
                success: function(data) {
                    if (data == 'maximum_allowed_sales_order_consumed') {
                        Swal.fire(
                            'Maximum Allowed Sales Order Consumed',
                            'Please Pay Past Sales Order First!',
                            'error'
                        );

                        $('#proceed').hide();
                    } else {
                        $('#proceed').show();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $("#work_flow_show_inventory").on('submit', (function(e) {
            e.preventDefault();
            //$('.loading').show();
            $.ajax({
                url: "work_flow_show_inventory",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('.loading').hide();
                    $('#work_flow_show_inventory_page').html(data);
                },
            });
        }));
    </script>
    </body>

    </html>
@endsection
