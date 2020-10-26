@extends('administator.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Download Voice Management</h1>
            
            <div class="row justify-content-center" style="padding-top: 5em;">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">{{ __('Download File') }}</div>
                  <div class="card-body">
                    <form action="{{ route('download') }} " method="POST">
                      @csrf

                      {{-- Start Date --}}
                      <div class="form-group row">
                        <label for="startdate" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                            <input id="startdate" type="date" class="form-control @error('startdate') is-invalid @enderror" name="startdate" value="{{ old('startdate') }}" required autocomplete="startdate" autofocus>
                            </div>
                            @if ($errors->has('startdate')) <p style="color:red;">{{ $errors->first('startdate') }}</p> @endif
                        </div>
                      </div>

                      {{-- End Date --}}
                      <div class="form-group row">
                        <label for="enddate" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                            <input id="enddate" type="date" class="form-control @error('enddate') is-invalid @enderror" name="enddate" value="{{ old('enddate') }}" required autocomplete="enddate" autofocus>
                            </div>
                            @if ($errors->has('enddate')) <p style="color:red;">{{ $errors->first('enddate') }}</p> @endif
                        </div>
                      </div>

                      <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('Get Download Link') }}
                          </button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
</div>
@endsection