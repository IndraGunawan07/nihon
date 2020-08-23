 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                            src="https://www.gravatar.com/avatar/"
                            alt="User profile picture">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @method('patch')
                            @csrf
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" autocomplete="username" autofocus>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                             {{-- <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $user->password) }}" autocomplete="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card-body profile -->
            </div>  <!-- /.card -->
        </div> <!-- col-md -->
    </div>
</div>
@endsection 


<!-- Option 2 -->
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-8">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                                src="https://www.gravatar.com/avatar/"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center mt-3">{{ Auth::user()->username }} </h3> 

                        <!-- profile box --> 
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
    </div>
</div>
@endsection --}}
