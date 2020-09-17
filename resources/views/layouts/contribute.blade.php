@extends('layouts.app')

@section('content')
<!-- banner -->
<div class="banner-contribute" id="home">
    <div class="container">
        <div class="ser-lt" style="padding-top: 10em; text-align: center;">
                <span class="line my-4"></span>
                <h2 class="my-3 banner-sub" style="color: black">Japan Writing System ( JWS )</h2>
                <span class="line my-4"></span>
                <h4 class="my-3 banner-sub" style="color: black; font-size: 30px;">Read bluah blueh ( RWS )</h4>
                <span class="line my-4"></span>
                <h6 class="my-" style="color: black">Artinya</h6>
        </div>

        <div style="text-align: center; padding-top: 12px;">
            <audio controls>
                <source src="{{ Auth::user()-> }}" type="audio/ogg">
                <source src="horse.mp3" type="audio/mpeg">
              Your browser does not support the audio element.
              </audio>
        </div>
    </div>
    </div>
<!-- //banner -->
@endsection