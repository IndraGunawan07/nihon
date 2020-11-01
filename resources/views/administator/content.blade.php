@extends('administator.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0 text-dark">Content Management</h1>
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
              <h3 class="card-title">DataTable Content</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th width="5%">#</th>
                    <th width="15%">References Key</th>
                    <th width="35%">Value</th>
                    <th width="10%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach ($content as $key) 
                  <tr>
                    <td><?=$i++?></td>
                    <td>{{ $key->reference_key }}</td>
                    <td>{{ $key->value }}</td>
                    <td>
                      <form action="{{ route('updatecontent') }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#myModal" data-reference_key="{{ $key->reference_key }}" data-value="{{ $key->value }}" data-id="{{ $key->id }}">Edit</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
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

<!-- Edit Content Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Content</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="POST" action="{{ route('updatecontent') }}" enctype="multipart/form-data">
        @csrf
         <div class="modal-body">

           {{-- Reference Key --}}
           <div class="form-group row">
            <label for="reference_key" class="col-md-4 col-form-label text-md-right">{{ __('Reference_Key') }}</label>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input id="reference_key" type="text" class="form-control @error('reference_key') is-invalid @enderror" name="reference_key" value="" autocomplete="reference_key" autofocus disabled>
                    <input type="hidden" id="id" name="id" value="">
                    <input id="rkey" type="hidden" name="rkey" value="">
                </div>
                @error('reference_key')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
             </div>
           </div>

            {{-- Value --}}
            <div class="form-group row">
                <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <textarea class="form-control @error('value') is-invalid @enderror" rows="5" id="value" name="value" required autocomplete="value" autofocus></textarea>
                    </div>
                    @error('value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
          {{-- Submit Button --}}
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Edit Content') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Edit Content Modal -->

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
