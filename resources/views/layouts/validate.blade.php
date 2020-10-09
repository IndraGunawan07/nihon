@extends('layouts.app')

@section('content')
<!-- banner -->
<div class="banner-contribute" id="home">
    <div class="container">
        <div class="ser-lt" style="padding-top: 10em; text-align: center;">
            <span class="line my-4"></span>
            <h2 class="my-3 banner-sub" style="color: black; display: inline;">{{ $terms->in_jws }} / {{ $terms->in_rws }} / {{ $terms->bahasa_translation }}</h2>
            {{-- <span class="line my-4"></span>
            <h4 class="my-3 banner-sub" style="color: black; font-size: 30px;">{{ $terms->in_rws }}</h4>
            <span class="line my-4"></span>
            <h6 class="my-" style="color: black">{{ $terms->bahasa_translation }}</h6> --}}
        </div>

        
        <div style="text-align: center; padding-top: 30px;"> 
            <span class="fas fa-play-circle fa-5x pl-3" id="playAudio" style="align-content: center"></span>
            <audio id="dataAudio">
                <source src="{{ asset('storage/sound/' . $donations->donation_file_url )}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            
        </div>

        <div style="text-align: center; padding-top: 30px;">
          <p>Is the audio you heard above valid?</p>
          <form action="{{ route('validation') }}" method="POST">
            @csrf
            <button name="yes">Yes</button>
            <button name="no">No</button>
            <input type="hidden" name="donation_id" value="{{ $donations->id }}">
          </form>
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