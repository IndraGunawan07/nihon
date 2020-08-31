@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 10em;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $validUser->username }}'s Secret Question</div>
    
                    <div class="card-body">
                        <div class="form-group justify-content-center d-flex">
                            <p class="font-weight-bold" style="font-size: 20px;"> {{ $validUser->secret_question }} </p>
                        </div>
                        <form action="{{ route('check') }}" method="post">
                            @csrf
                            
                            {{-- {{ dd(get_defined_vars()['__data']['validUser']->username) }} --}}
                            <div class="form-group row">
                                <label for="secretanswer" class="col-md-4 col-form-label text-md-right">{{ __('Your Answer') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('secretanswer') is-invalid @enderror" name="secretanswer" value="{{ old('username') }}" required autocomplete="secretanswer" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @error('secretanswer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-0 justify-content-center d-flex">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Answer') }}
                                </button>
                            </div>
                            <input type="hidden" name="username" value="{{ $validUser->username }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection