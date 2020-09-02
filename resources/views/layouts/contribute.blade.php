@extends('layouts.app')

@section('content')
<!-- banner -->
	<div class="banner-contribute" id="home">
    <div class="container">
        <div class="ser-lt" style="padding-top: 10em; text-align: center;">
                <span class="line my-4"></span>
                <h2 class="my-3 banner-sub" style="color: black">Upload Your Voice</h2>
                <span class="line my-4"></span>
                 {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif --}}
        
                    {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="" method="post" enctype="">
                        @csrf
                        <div class="custom-file mb-6" style="width: 60%">
                            <input type="file" class="custom-file-input" id="customFile" name="filename" aria-describedby="fileHelp">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <small id="fileHelp" class="form-text text-muted">Please Choose file</small>
                        </div>
                        <div style="width: 40%"></div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
        </div>
    </div>
    </div>
<!-- //banner -->
{{-- <div style="text-align: center">DISINI BUTTON PLAY VOICE DKK</div> --}}
@endsection

{{-- <script>
    // console.log("Masuk gk sih");
    $( document ).ready(function() {
    console.log( "ready!" );
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    });
</script> --}}







