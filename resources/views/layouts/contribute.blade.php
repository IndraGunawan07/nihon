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
        <div style="text-align: center; padding-top: 12px;">
            <p>The Audio will record for 5 seconds when you press start</p>
            <i class="fas fa-microphone fa-7x" id="record"></i>
            <div class="audio" id="audio"></div>
            <div class="id" id="id"></div>
            <div id="audio-form" action="{{ route('saveAudio') }}">
              <button id="save" style="display: none;">Save</button>
            </div>
            {{-- <div id="hidsddenid" value="{{ $terms->id }}"></div> --}}
            <input type="hidden" id="hiddenid" name="idhidden" value="{{ $terms->id }}">
            <input type="hidden" id="hiddenrws" name="rwshidden" value="{{ $terms->in_rws }}">
        </div>
    </div>
    </div>
<!-- //banner -->

<script>
    const saveButton = document.getElementById('save');
    const playButton = document.getElementById('playAudio');
    const dataAudio = document.getElementById('dataAudio');
    const recordButton = document.getElementById('record');

    console.log(saveButton);
    let recorded = document.getElementById('recordedAudio');
    var device = navigator.mediaDevices.getUserMedia({audio: true});
    var blob;
    var isPlaying = 0;
    var isRecording = 0;
    
    let id = $('#hiddenid').attr('value');
    let rws = $('#hiddenrws').attr('value');
    console.log(rws);
    
    console.log(id);

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

    // startButton.addEventListener('click', function(){
    //     console.log("start is clicked");
    //     device.then(handleSuccess);
    //     if(audio.childNodes.length > 0)
    //     {
    //       audio.removeChild(audio.childNodes[0]);
    //     }
    // });

    recordButton.addEventListener('click', function(){
      console.log("start is clicked");
      saveButton.style.display = "none";
      if(!isRecording)
      {
        device.then(handleSuccess);
        if(audio.childNodes.length > 0)
        {
          audio.removeChild(audio.childNodes[0]);
        }
      }
      isRecording = !isRecording;
    });

    saveButton.addEventListener('click', function(){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var saveUrl = $('#audio-form').attr('action');
      console.log(saveUrl);
      var fd = new FormData();
            fd.append('audio', blob);
            fd.append('id', id);
            fd.append('rws', rws);
            console.log(fd);
            $.ajax({
                type: 'POST',
                url: saveUrl,
                data: fd,
                processData: false,
                contentType: false
            }).done(function(data) {
                  //  console.log(data);
                  //  alert("Berhasilll woyy","Data udah masuk cok");
                  toastr.success("Your Vote Has Been Saved");
            });
      var pending = setTimeout(() => {
        location.reload();
      }, 2000);
    });

    const handleSuccess = function(stream)
    {
      var items = [];
        var recorder = new MediaRecorder(stream);
        console.log(recorder.state);
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
            saveButton.style.display = "inline";
          }
        }
        recorder.start();

        recordButton.addEventListener('click', function(){
          if(recorder.state == 'recording')
          {
            recorder.stop();
            clearTimeout(timeOut);
          }
        });
        var timeOut = setTimeout(() => {
          recorder.stop();
        }, 6000);
    };
</script>
@endsection