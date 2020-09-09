@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 10em">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
    
                    <div class="card-body">
                        <form action="{{ route('confirmpass') }}" method="post">
                            @csrf
                            
                            {{-- {{ dd(get_defined_vars()['__data']['validUser']->username) }} --}}
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="newpassword" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
                                </div>
                            </div>

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

                            <div class="form-group mb-0 justify-content-center d-flex">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit New Password') }}
                                </button>
                            </div>
                            <input type="hidden" name="username" value="{{ session('username') }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection