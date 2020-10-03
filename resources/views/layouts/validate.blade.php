@extends('layouts.app')

@section('content')
<!-- banner -->
<div class="banner-contribute" id="home">
    <div class="container">
        <div class="ser-lt" style="padding-top: 10em; text-align: center;">
            <span class="line my-4"></span>
            <h2 class="my-3 banner-sub" style="color: black; display: inline;">{{ $terms->in_jws }} / {{ $terms->in_rws }} / {{ $terms->bahasa_translation }}</h2>
            <span class="fas fa-play-circle fa-2x pl-3" id="playAudio"></span>
            {{-- <span class="line my-4"></span>
            <h4 class="my-3 banner-sub" style="color: black; font-size: 30px;">{{ $terms->in_rws }}</h4>
            <span class="line my-4"></span>
            <h6 class="my-" style="color: black">{{ $terms->bahasa_translation }}</h6> --}}
        </div>

        <div style="text-align: center; padding-top: 12px;"> 
            <audio id="dataAudio">
                <source src="{{ asset('storage/sound/' . $terms->sound_file_url )}}" type="audio/mpeg">
              Your browser does not support the audio element.
              </audio>
        </div>
    </div>
    </div>
<!-- //banner -->

<script>
    const playButton = document.getElementById('playAudio');
    const dataAudio = document.getElementById('dataAudio');

    var isPlaying = 0;

    playButton.addEventListener('click', function(){
      if(!isPlaying)
      {
        dataAudio.play();
        isPlaying = !isPlaying;
      }
      else{
        dataAudio.pause();
        isPlaying = !isPlaying;
      }
    });
</script>
@endsection