<!-- Edit Syllable Modal -->
<div class="modal fade" id="editModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit Syllable</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <form method="POST" action="{{ route('updateterms') }}" enctype="multipart/form-data">
        
        @csrf
        <div class="modal-body">
        {{-- JWS --}}
        <div class="form-group row">
            <label for="jws" class="col-md-4 col-form-label text-md-right">{{ __('JWS') }}</label>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input id="jws" type="text" class="form-control @error('jws') is-invalid @enderror" name="jws" required autocomplete="jws" autofocus>
                    <input type="hidden" id="hiddenid" name="id" value="">
                </div>
                
                @error('jws')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- RWS --}}
        <div class="form-group row">
            <label for="rws" class="col-md-4 col-form-label text-md-right">{{ __('RWS') }}</label>
            <div class="col-md-6">
                <div class="input-group mb-3">
                <input id="rws" type="text" class="form-control @error('rws') is-invalid @enderror" name="rws">
                </div>
                @error('rws')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Translate --}}
        <div class="form-group row">
            <label for="translate" class="col-md-4 col-form-label text-md-right">{{ __('Translate') }}</label>
            <div class="col-md-6">
                <div class="input-group mb-3">
                <input id="bahasa_translation" type="text" class="form-control @error('bahasa_translation') is-invalid @enderror" name="bahasa_translation">
                </div>
                @error('bahasa_translation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Upload File -->
        <div class="form-group row">
            <label for="fileupload" class="col-md-4 col-form-label text-md-right">{{ __('File Input') }}</label>
            <div class="col-md-6">
                <div class="input-group mb-3">
                <input class="custom-file-input @error('fileupload') is-invalid @enderror" type="file" name="fileupload" autocomplete="fileupload">
                <label class="custom-file-label" id="uploadfile" for="fileupload" >Choose file</label>
                </div>
                @error('fileupload')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Sylable') }}
                </button>
            </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
    </div>
  </div>
</div>
</div>
