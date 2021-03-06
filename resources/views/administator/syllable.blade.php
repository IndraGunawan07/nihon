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

    <!-- Untuk Modal Add Sylable -->
    <div class="container">
      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-info btn-sm m-2" data-toggle="modal" data-target="#myModal">+ Add Sylable</button>
      @if(count($errors) > 0)
        <ul>
          @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
      <!-- Add User Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Sylable</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('syllable.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                {{-- JWS --}}
                <div class="form-group row">
                    <label for="jws" class="col-md-4 col-form-label text-md-right">{{ __('JWS') }}</label>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input id="jws" type="text" class="form-control @error('jws') is-invalid @enderror" name="jws" value="" required autocomplete="jws" autofocus>
                        </div>
                        @error('jws')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
  
                {{-- RWS --}}
                <div class="form-group row">
                    <label for="rws" class="col-md-4 col-form-label text-md-right">{{ __('RWS') }}</label>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                        <input id="rws" type="text" class="form-control @error('rws') is-invalid @enderror" name="rws" required autocomplete="rws">
                        </div>
                        @error('rws')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
  
                {{-- Translate --}}
                <div class="form-group row">
                    <label for="bahasa_translation" class="col-md-4 col-form-label text-md-right">{{ __('Translate') }}</label>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                        <input id="bahasa_translation" type="text" class="form-control @error('bahasa_translation') is-invalid @enderror" name="bahasa_translation" value="" required autocomplete="bahasa_translation" autofocus>
                        </div>
                        @error('bahasa_translation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Bahasa --}}
                <div class="form-group row">
                  <label for="bahasa" class="col-md-4 col-form-label text-md-right">{{ __('Kategori Bahasa') }}</label>
                  <div class="col-md-6">
                    {{-- <div class="input-group mb-3"> --}}
                      <select id="bahasa" class="input-group mb-3 form-control p-2 @error('secret_question') is-invalid @enderror" name="bahasa" value="" required
                      style="height: 35px">
                        <option value="" disabled selected>Pilih kategori bahasa</option>  
                        <option value="Jepang">Jepang </option>
                        <option value="Korea">Korea</option>
                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                      </select> 
                    {{-- </div>  --}}
                      @error('bahasa')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <!-- Upload File -->
                <div class="form-group row">
                  <label for="fileupload" class="col-md-4 col-form-label text-md-right">{{ __('File Input') }}</label>
                  <div class="col-md-6">
                    <div class="input-group mb-3"  style="height: 35px">
                      <input class="custom-file-input @error('fileupload') is-invalid @enderror"  id="fileupload" type="file" name="fileupload" value="" required autocomplete="fileupload">
                      <label class="custom-file-label" for="fileupload">Choose file</label>
                    </div>
                    @error('fileupload')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                {{-- Submit Button --}}
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Add Sylable') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Edit Sylable Modal -->
      @include ('administator._form')
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable Syllable</h3>
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
                      <th width="10%"></th>
                      <th width="10%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                      @foreach ($terms as $key) 
                        <tr>
                          <td><?=$i++?></td>
                          <td>{{ $key->in_jws }}</td>
                          <td>{{ $key->in_rws }}</td>
                          <td>{{ $key->bahasa_translation }}</td>
                          <td>{{ date('Y-M-d', strtotime($key->created_at)) }}</td>
                          <td>
                            <audio controls>
                              <source src="{{ asset('storage/sound/'.$key->sound_file_url )}}" type="audio/mpeg">
                            Your browser does not support the audio element.
                            </audio>
                          </td>
                          <td>
                            {{-- untuk button edit --}}
                            <form action="{{ route('updateterms') }}" method="post">
                              @csrf
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-jws="{{ $key->in_jws }}" data-rws="{{ $key->in_rws }}" 
                                data-translate="{{ $key->bahasa_translation }}" data-filename="{{ $key->sound_file_url }}" 
                              data-id = "{{ $key->id }}" data-target="#editModal" data-bahasa="{{ $key->bahasa }}">Edit</button>
                            </form>
                          </td>
                          <td>
                            {{-- untuk button delete --}}
                            <form action="{{ route('deleteterms') }}" method="post">
                              @csrf
                              <button class="btn btn-danger btn-sm">Delete</button>
                              <input type="hidden" name="in_jws" value="{{ $key->in_jws }}">
                            </form>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                <div style="text-align: end">
                  {{ $terms->links() }}
                </div>
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
      "paging": false,
      "ordering": true,
      "info": true,
      
    });
    console.log( "ready!" );
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  });
</script>
@endsection
