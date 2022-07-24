@extends('layouts.master')

@section('title', 'COLLECTION EXPORT')
<style>
    #collection_export th:first-child,
    #collection_export td:first-child {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    }
</style>
@section('navbar')


@section('sidebar')


@section('content')

    <br />
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-weight: bold;">COLLECTION EXPORT</h3>
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
                <div class="table table-responsive">
                    <table class="table table-bordered table-sm" id="collection_export">
                        <thead>
                            <tr>
                                <th>Store Name</th>
                                <th>Principal</th>
                                <th>Mode of Transaction</th>
                                <th>DR</th>
                                <th>Sku_type</th>
                                <th>Total Amount</th>
                                <th>Amount Paid</th>
                                <th>BO</th>
                                <th>Balance</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $data)
                                <tr>
                                    <td>{{ $data->customer->store_name }}</td>
                                    <td>{{ $data->principal }}</td>
                                    <td>{{ $data->mode_of_transaction }}</td>
                                    <td>{{ $data->dr }}</td>
                                    <td>{{ $data->sku_type }}</td>
                                    <td style="text-align: right">{{ $data->total_amount }}</td>
                                    <td style="text-align: right">{{ $data->amount_paid }}</td>
                                    <td style="text-align: right">{{ $data->total_bo }}</td>
                                    <td style="text-align: right">{{ $data->balance }}</td>
                                    <td>{{ $data->remarks }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
    </script>
    </body>

    </html>
@endsection
