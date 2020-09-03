@extends('layouts.app')

@section('content')
<!-- banner -->
<div class="banner" id="home">
    <div class="container">
        <div class="ser-lt" style="padding-top: 13em;">
                <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-6" style="display: inline">{{ __('Dashboard') }}</div>
                            <div class="float-right">
                                <a href= {{ route('homepage') }}><button class="btn btn-outline-danger btn-sm">X</button></a>
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
    </div>
</div>
<!-- //banner -->
@endsection
