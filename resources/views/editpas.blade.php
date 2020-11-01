@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 10em;">
        <div class="col-md-8">
            <div class="card-header">
                <div class="col-md-6" style="display: inline">{{ __('Change Password') }}</div>
            </div>
            
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.updatepassword') }}">
                            @method('patch')
                            @csrf
                        
                            <!-- Update Password -->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="newpassword" autofocus>
                                    <input type="hidden" id="hiddenusername" name="username" value="{{ $user->username }}">    
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
                                </div>
                            </div>

                            {{-- Password Confirmation --}}
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('confirm') }}" required autocomplete="confirm" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Change Password
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