@extends('administator.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
            <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">{{ __('Users') }}</span>
                  <span class="info-box-number">{{ $users }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-audio"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">{{ __('Syllable') }}</span>
                  <span class="info-box-number">{{ $terms }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-microphone"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">{{ __('Donation') }}</span>
                  <span class="info-box-number">{{ $donation }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check-square"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">{{ __('Valid Donation') }}</span>
                  <span class="info-box-number">{{ $valdonation }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-offset-3 col-md-6">
              <div class="card card-primary collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">What to do ??? </h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  The body of the card
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>


        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->


</div>

@endsection
