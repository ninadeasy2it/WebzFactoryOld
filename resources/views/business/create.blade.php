{{ Form::open(array('url' => route('business.store')))}}
    <div class="row">
        <div class="col-12">
            {{Form::label('Business',__('Business'),['class'=>'form-control-label'])}}
            {{Form::text('title',null,array('class'=>'form-control mt-2'))}}
            @error('title')
                <span class="invalid-favicon text-xs text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>  
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
        <input class="btn btn-primary" type="submit" value="{{ __('Create') }}">
    </div>
  