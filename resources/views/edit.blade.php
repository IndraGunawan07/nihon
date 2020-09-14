 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 10em;">
        <div class="col-md-8">
            <!-- Profile Avatar -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @method('patch')
                            @csrf
                        @if( Auth::user()->imageUrl === NULL )
                            <img class="profile-user-img img-fluid rounded-circle"
                                    src="https://www.gravatar.com/avatar/"
                                    alt="User profile picture">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input class="custom-file-input @error('fileupload') is-invalid @enderror"  id="fileupload" type="file" name="fileupload" value="" required autocomplete="fileupload">
                                        <label class="custom-file-label" for="fileupload">Choose file</label>
                                        <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                                    </div>
                                </div>
                            </div>
                        @else 
                            <div class="img-wrap">
                                <img class="profile-user-img img-fluid rounded-circle"
                                        src="{{ asset('storage/images/'.Auth::user()->imageUrl)}}"
                                        alt="User profile picture">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input class="custom-file-input @error('fileupload') is-invalid @enderror"  id="fileupload" type="file" name="fileupload" value="" required autocomplete="fileupload">
                                            <label class="custom-file-label" for="fileupload">Choose file</label>
                                            <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">

                            <!-- User Name Edit Profile -->
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