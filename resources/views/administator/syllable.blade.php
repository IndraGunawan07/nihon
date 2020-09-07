@extends('administator.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Syllable Management</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th width="5%">#</th>
                        <th width="20%">JWS</th>
                        <th width="20%">RWS</th>
                        <th width="20%">Translate</th>
                        <th width="15%">Created At</th>
                        <th width="15%">Sound File</th>
                        <th width="20%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
                 <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
</div>

<script>
    console.log('readi');
    document.addEventListener('DOMContentLoaded', function (){
      $('#example1').DataTable({
        "responsive": true,
        "autoWidth": false,
        
      });
    });
  </script>
@endsection
