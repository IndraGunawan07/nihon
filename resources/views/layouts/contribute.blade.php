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
        <div style="text-align: center; padding-top: 12px;">
            <p>The Audio will record for 5 seconds when you press start</p>
            <button id="start">Start</button>
            <button id="stop">Stop</button>
            <div class="audio" id="audio"></div>
            <div id="audio-form" action="{{ route('saveAudio') }}">
              <button id="save">Save</button>
            </div>
        </div>
    </div>
    </div>
<!-- //banner -->

<script>
    const startButton = document.getElementById('start');
    const stopButton = document.getElementById('stop');
    const saveButton = document.getElementById('save');
    let recorded = document.getElementById('recordedAudio');
    var device = navigator.mediaDevices.getUserMedia({audio: true});
    var blob;
    

    startButton.addEventListener('click', function(){
        console.log("start is clicked");
        device.then(handleSuccess);
        if(audio.childNodes.length > 0)
        {
          audio.removeChild(audio.childNodes[0]);
        }
    });

    saveButton.addEventListener('click', function(){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      var saveUrl = $('#audio-form').attr('action');
      //console.log(saveUrl);
      var fd = new FormData();
            fd.append('audio', blob);
            $.ajax({
              
                type: 'POST',
                url: saveUrl,
                data: fd,
                processData: false,
                contentType: false
            }).done(function(data) {
                   console.log(data);
            });
    });

    const handleSuccess = function(stream)
    {
      var items = [];
        var recorder = new MediaRecorder(stream);
        recorder.ondataavailable = e => {
          items.push(e.data);
          if(recorder.state == 'inactive')
          {
            blob = new Blob(items, {type: 'audio/webm'});
            var audio = document.getElementById('audio');
            var mainaudio = document.createElement('audio');
            mainaudio.setAttribute('controls', 'controls');
            audio.appendChild(mainaudio);
            mainaudio.innerHTML = '<source src="' + URL.createObjectURL(blob) + '"type="video/webm"/>';
          }
        }
        stopButton.addEventListener('click', function(){
            recorder.stop();
        })
        recorder.start();
        setTimeout(()=>{
          recorder.stop();
        }, 6000);
    };
</script>
@endsection