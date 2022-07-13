@extends('layouts.master')

@section('title', 'SALES REGISTER UPLOAD')

@section('navbar')


@section('sidebar')


@section('content')
 
   <br />
   <!-- Main content -->
   <section class="content">
     <!-- Default box -->
     <div class="card">
       <div class="card-header">
         <h3 class="card-title" style="font-weight: bold;">SALES REGISTER UPLOAD</h3>
         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
           <i class="fas fa-minus"></i></button>
           <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
           <i class="fas fa-times"></i></button>
         </div>
       </div>
       <div class="card-body">
         <form id="sales_register_upload_process">
           <div class="form-group">
             <label for="exampleInputFile">File input</label>
             <input type="file" name="agent_csv_file" required class="form-control">
           </div>
            <div class="form-group">
             
             <button type="submit" class="btn btn-success btn-block">SUBMIT</button>
           </div>
         </form>
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

 $("#sales_register_upload_process").on('submit',(function(e){
       e.preventDefault();
       $('.loading').show();
         $.ajax({
           url: "sales_register_upload_process",
           type: "POST",
           data:  new FormData(this),
           contentType: false,
           cache: false,
           processData:false,
           success: function(data){
             console.log(data);
             if (data == 'saved') {
               Swal.fire({
                 position: 'top-end',
                 icon: 'success',
                 title: 'Sale Register Uploaded',
                 showConfirmButton: false,
                 timer: 1500
               })

               $('.loading').hide();
               // location.reload();
               //window.location.href = "/principal_upload";
             }else{
               Swal.fire(
                 'Something went wrong!',
                 data,
                 'error'
               )
                $('.loading').hide();
             }
           },
     });
   }));


</script>
</body>
</html>
@endsection
























