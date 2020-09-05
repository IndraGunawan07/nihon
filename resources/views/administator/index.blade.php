@extends('administator.admin')

@section('contributor')
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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Joined</th>
            <th scope="col">Approve</th>
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
                  <td>
                    <form action="{{ route('approve') }}" method="post">
                      @csrf
                      <button class="btn btn-primary btn-sm">Approve</button>
                      <input type="hidden" name="user" value="{{ $user->username }}">
                    </form>
                  </td>
                <?php 
                  echo "</tr>";
                ?>
              @endif
            @endforeach
        </tbody>
      </table>
      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection

@section('validator')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Validating User</h1>
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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection