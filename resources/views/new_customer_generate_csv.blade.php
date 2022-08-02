@extends('layouts.master')

@section('title', 'CUSTOMER EXPORT')
<style>
    #new_customer th:first-child,
    #new_customer td:first-child {
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
                <h3 class="card-title" style="font-weight: bold;">CUSTOMER EXPORT</h3>
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
                    <table class="table table-bordered table-sm" id="new_customer">
                        <thead>
                            <tr>
                                <th>New Customer</th>
                                <th>{{ $agent_user->agent_name ."-". $date ."". $time }}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>Scheduled Day</th>
                                <th>Store Name</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Location</th>
                                <th>Location ID</th>
                                <th>Detailed Address</th>
                                <th>Coordinates</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer_export as $exported)
                                <tr>
                                    <td>{{ $exported->schedule_day }}</td>
                                    <td>{{ $exported->store_name }}</td>
                                    <td>{{ $exported->contact_person }}</td>
                                    <td>{{ $exported->contact_number }}</td>
                                    <td>{{ $exported->location_id }}</td>
                                    <td>{{ $exported->location }}</td>
                                    <td>{{ $exported->detailed_address }}</td>
                                    <td>{{ $exported->coordinates }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

                <button class="btn btn-block btn-success"
                    onclick="exportTableToCSV('{{ $agent_user->agent_name }} New Customer.csv')">EXPORT
                    DATA</button>
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

        function downloadCSV(csv, filename) {
              var csvFile;
              var downloadLink;
      
              // CSV file
              csvFile = new Blob([csv], {
                  type: "text/csv"
              });
      
              // Download link
              downloadLink = document.createElement("a");
      
              // File name
              downloadLink.download = filename;
      
              // Create a link to the file
              downloadLink.href = window.URL.createObjectURL(csvFile);
      
              // Hide download link
              downloadLink.style.display = "none";
      
              // Add the link to DOM
              document.body.appendChild(downloadLink);
      
              // Click download link
              downloadLink.click();
          }
      
          function exportTableToCSV(filename) {
              $('.loading').show();
              var csv = [];
              var rows = document.querySelectorAll("#new_customer tr");
      
              for (var i = 0; i < rows.length; i++) {
                  var row = [],
                      cols = rows[i].querySelectorAll("td, th");
      
                  for (var j = 0; j < cols.length; j++)
                      row.push(cols[j].innerText);
      
                  csv.push(row.join(","));
              }
      
              // Download CSV file
              downloadCSV(csv.join("\n"), filename);
              window.location.replace("{{ route('work_flow') }}");
          }
    </script>
    </body>

    </html>
@endsection
