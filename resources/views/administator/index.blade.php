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
                    <th width="20%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; ?>
                  @foreach($users as $user)
                    @if($user->is_locked === 1)
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
                            <button class="btn btn-info btn-sm">Approve</button>
                            <input type="hidden" name="user" value="{{ $user->username }}">
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
                      @endif
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