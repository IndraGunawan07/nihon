@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                                src="https://www.gravatar.com/avatar/"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center mt-3">{{ Auth::user()->username }} </h3>

                        {{-- profile box --}}
                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Role</b> <a class="float-right">{{ Auth::user()->role }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <a class="float-right">Busy</a>
                        </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
            </div>
        </div> 
            
        {{-- <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ Auth::user()->id }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('This is Profile!') }}
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
