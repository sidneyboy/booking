@extends('layouts.master')

@section('title', 'NEW CUSTOMER')

@section('navbar')


@section('sidebar')


@section('content')

    <br />
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-weight: bold;">NEW CUSTOMER</h3>
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
                <form id="new_customer_generate_csv">
                    <div class="form-group">
                        <label>Store Name</label>
                        <input type="text" class="form-control" name="store_name" required>

                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" required>

                        <label>Contact Number</label>
                        <input type="number" min="0" class="form-control" name="contact_number" required>

                        <label>Location</label>
                        <select name="location" id="" class="form-control select2" style="width:100%;">
                            <option value="" default>Select</option>
                            @foreach ($location as $data)
                                <option value="{{ $data->id ."-". $data->location }}">{{ $data->location }}</option>
                            @endforeach
                        </select>

                        <label>Detailed Addres</label>
                        <input type="text" class="form-control" name="detailed_address" required>

                        <input type="hidden" value="{{ $agent_user->agent_name }}" name="agent_name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">SUBMIT NEW LOCATION</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                    <div id="new_customer_generate_csv_page"></div>
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

        $("#new_customer_generate_csv").on('submit', (function(e) {
            e.preventDefault();
            //$('.loading').show();
            $.ajax({
                url: "new_customer_generate_csv",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $('#new_customer_generate_csv_page').html(data)
                    // if (data == 'saved') {
                    //     Swal.fire({
                    //         position: 'top-end',
                    //         icon: 'success',
                    //         title: 'Location Data Uploaded',
                    //         showConfirmButton: false,
                    //         timer: 1500
                    //     })

                    //     $('.loading').hide();
                    //     // location.reload();
                    //     window.location.href = "/principal_upload";
                    // } else {
                    //     Swal.fire(
                    //         'Something went wrong!',
                    //         data,
                    //         'error'
                    //     )
                    //     $('.loading').hide();
                    // }
                },
            });
        }));
    </script>
    </body>

    </html>
@endsection
