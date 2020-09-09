@extends('administator.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Approving User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm m-2" data-toggle="modal" data-target="#myModal">+ Add User</button>
    
    @if(count($errors) > 0)
      <ul>
        @foreach($errors->all() as $error)
          <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <!-- Add User Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('addUser') }}">
              @csrf

              {{-- Username --}}
              <div class="form-group row">
                  <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                  <div class="col-md-6">
                      <div class="input-group mb-3">
                          <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autocomplete="username" autofocus>
                      </div>
                      @error('username')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              {{-- password  --}}
              <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                  <div class="col-md-6">
                      <div class="input-group mb-3">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      </div>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              {{-- Retype Password --}}
              <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                  <div class="col-md-6">
                      <div class="input-group mb-3">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                  </div>
              </div>

              {{-- Secret_Question --}}
              <div class="form-group row">
                  <label for="secret_question" class="col-md-4 col-form-label text-md-right">{{ __('Secret Question') }}</label>
                  <div class="col-md-6">
                      <select id="secret_question" class="form-control p-2 @error('secret_question') is-invalid @enderror" name="secret_question" value="" required>
                          <option value="" disabled selected>Please select question</option>  
                          <option value="In what city were you born">In what city were you born? </option>
                          <option value="What was your father's middle name">What was your father's middle name ? </option>
                          <option value="What was your first pet?">What was your first pet ? </option>
                      </select>
                      {{-- <input id="secret_question" type="text" class="form-control @error('secret_question') is-invalid @enderror" name="secret_question" value="{{ old('secret_question') }}" required autocomplete="secret_question" autofocus> --}}
                      @error('secret_question')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              {{-- Secret_Answer --}}
              <div class="form-group row">
                  <label for="secret_answer" class="col-md-4 col-form-label text-md-right">{{ __('Secret answer') }}</label>
                  <div class="col-md-6">
                      <div class="input-group mb-3">
                      <input id="secret_answer" type="text" class="form-control @error('secret_answer') is-invalid @enderror" name="secret_answer" value="" required autocomplete="secret_answer" autofocus>
                      </div>
                      @error('secret_answer')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              {{-- Submit Button --}}
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add User') }}
                    </button>
                </div>
            </div>
          </form>
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
  
  <!-- /.content-header -->

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
                    <th width="20%">Username</th>
                    <th width="20%">Joined</th>
                    <th width="20%">Role</th>
                    <th width="15%">Approve</th>
                    <th width="20%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; ?>
                  @foreach($users as $user)
                      <?php
                        $i++;
                        echo "<tr>";
                        echo "<th scope='row'>". $i . "</th>";
                      ?>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                          <form action="{{ route('approve') }}" method="post">
                            @csrf
                            @if($user->is_locked)
                              <button class="btn btn-info btn-sm">Approve</button>
                              <input type="hidden" name="user" value="{{ $user->username }}">
                            @else
                            <button class="btn btn-info btn-sm" disabled>Approve</button>
                            @endif
                          </form>
                        </td>                  
                        <td>
                          {{-- untuk button edit --}}
                          <form action="" method="post">
                            @csrf
                            <button class="btn btn-primary btn-sm">Edit</span></button>
                            <input type="hidden" name="user" value="{{ $user->username }}">
                          </form>
        
                          {{-- untuk button delete --}}
                          <form action="" method="post">
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                            <input type="hidden" name="user" value="{{ $user->username }}">
                          </form>
                        </td>
                        <?php echo "</tr>"; ?>
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