@extends('administator.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0 text-dark">Donation Management</h1>
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
                <h3 class="card-title">DataTable Donation</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th width="5%">#</th>
                      <th width="15%">Terms</th>
                      <th width="15%">Username</th>
                      <th width="20%">Created At</th>
                      <th width="20%">Validate Status</th>
                      <th width="15%">Sound File</th>
                      <th width="10%"></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 1; ?>
                      @foreach ($donation as $key) 
                      <tr>
                        <td><?=$i++?></td>
                        <td>{{ $key->terms->in_rws }}</td>
                        <td>{{ $key->users->username }}</td>
                        <td>{{ date('Y-M-d', strtotime($key->created_at)) }}</td>
                        <td>
                          @if ($key->validated_by == NULL)
                              Not Validated
                          @else 
                              Validated
                          @endif
                        </td>
                        <td>
                          <audio controls>
                            <source src="{{ asset('storage/sound/' . $key->donation_file_url )}}" type="audio/mpeg">
                          Your browser does not support the audio element.
                          </audio>
                        </td>
                        <td>
                          {{-- untuk button delete --}}
                          <form action="{{ route('donation.destroy', $key->id) }}" method="post">
                              {{ method_field('DELETE')}}
                              @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                            <input type="hidden" name="id" value="{{ $key->id }}">
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="text-align: end">
                  {{ $donation->links() }}
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
  });
</script>


@endsection
