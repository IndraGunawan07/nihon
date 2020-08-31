@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 10em;">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-6">{{ __('Dashboard') }}</div>
                        <div class="float-right">
                            <a href="/"><button class="btn btn-outline-danger btn-sm">x</button></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
