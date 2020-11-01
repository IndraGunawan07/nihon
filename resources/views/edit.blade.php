 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 10em;">
        <div class="col-md-8">
            <!-- Profile Avatar -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                        @if( Auth::user()->imageUrl === NULL )
                        <!-- Ketika user klik image profile, maka akan muncul file upload -->
                        <div class="image-upload img-wrap">
                            <label for="file-input">
                                <img id="blah" class="profile-user-img img-fluid rounded-circle" src="https://www.gravatar.com/avatar/" alt="User profile picture">                                
                            </label>
                            <input id="file-input" type="file" name="avatar" onchange="readURL(this)" />
                        </div>
                        @else 
                        <!-- Ketika user klik image profile, maka akan muncul file upload, ini untuk user yang sudah punya avatar-->
                        <div class="img-wrap image-upload">
                            <label for="file-input">
                            <img id="blah" class="profile-user-img img-fluid rounded-circle"
                                    src="{{ asset('storage/images/'.Auth::user()->imageUrl)}}"
                                    alt="User profile picture">
                            </label>
                            <input id="file-input" type="file" name="avatar" onchange="readURL(this)" />
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <!-- User Name Edit Profile -->
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" autocomplete="username" autofocus>
                                <input type="hidden" id="hiddenid" name="id" value="{{ $user->id }}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
<script>
    // ketika user upload gambar maka, tampilkan gambarnya
    function readURL(input) {
        console.log(input.files);
        console.log(input.files[0]);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection 