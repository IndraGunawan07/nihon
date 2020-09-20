@extends('layouts.app')

@section('content')
<!-- banner -->
<div class="banner-contribute" id="home">
    <div class="container">
        <div class="ser-lt" style="padding-top: 10em; text-align: center;">
                <span class="line my-4"></span>
                <h2 class="my-3 banner-sub" style="color: black">{{ $terms->in_jws }}</h2>
                <span class="line my-4"></span>
                <h4 class="my-3 banner-sub" style="color: black; font-size: 30px;">{{ $terms->in_rws }}</h4>
                <span class="line my-4"></span>
                <h6 class="my-" style="color: black">{{ $terms->bahasa_translation }}</h6>
        </div>

        <div style="text-align: center; padding-top: 12px;"> 
            <audio controls>
                <source src="{{ asset('storage/sound/' . $terms->sound_file_url )}}" type="audio/mpeg">
              Your browser does not support the audio element.
              </audio>
        </div>
    </div>
    </div>
<!-- //banner -->
@endsection