 {{Form::model($plan, array('route' => array('plans.update', $plan->id), 'method' => 'PUT', 'enctype' => "multipart/form-data")) }}
    <div class="row">
        <div class="form-group col-md-6">
            {{Form::label('name',__('Name'),['class'=>'form-label'])}}
            {{Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Plan Name'),'required'=>'required'))}}
        </div>
        @if($plan->id != 1)
            <div class="form-group col-md-6">
                {{Form::label('price',__('Price'),['class'=>'form-label'])}}
                {{Form::number('price',null,array('class'=>'form-control','placeholder'=>__('Enter Plan Price'),'required'=>'required'))}}
            </div>
        @endif
        <div class="form-group col-md-6">
            {{ Form::label('duration', __('Duration'),['class'=>'form-label']) }}
            {!! Form::select('duration', $arrDuration, null,array('class' => 'form-control select2','required'=>'required')) !!}
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('business', __('Max Business'),['class'=>'form-label']) }}
            {{Form::number('business',null,array('class'=>'form-control','placeholder'=>__('Enter Max Business Create Limite')))}}
            <span class="small">{{__('Note: "-1" for Unlimited')}}</span>
        </div>
        <div class="col-6">

        <div class="form-check form-switch custom-switch-v1">
            <input type="checkbox" class="form-check-input input-primary" name="enable_custdomain" id="enable_custdomain" {{ ($plan['enable_custdomain'] == 'on') ? 'checked=checked' : '' }}>
            <label class="form-check-label" for="enable_custdomain">{{__('Enable Domain')}}</label>
        </div>
        </div>
        <div class="col-6">
            <div class="form-check form-switch custom-switch-v1">
                <input type="checkbox" class="form-check-input input-primary" name="enable_custsubdomain" id="enable_custsubdomain" {{ ($plan['enable_custsubdomain'] == 'on') ? 'checked=checked' : '' }}>
                <label class="form-check-label" for="enable_custsubdomain">{{__('Enable Sub Domain')}}</label>
            </div>
        </div>
        <div class="col-6"><br>
            <div class="form-check form-switch custom-switch-v1">
                <input type="checkbox" class="form-check-input input-primary" name="enable_branding" id="enable_branding" {{ ($plan['enable_branding'] == 'on') ? 'checked=checked' : '' }}>
                <label class="form-check-label" for="enable_branding">{{__('Enable Branding')}}</label>
            </div>
        </div>
        <div class="horizontal mt-3">

            <div class="verticals twelve">
                <div class="form-group col-md-6">
                  {{ Form::label('Select Themes', __('Select Themes'),['class'=>'form-label']) }}
                </div>
                <ul class="uploaded-pics">
                    @foreach(\App\Models\Utility::themeOne() as $key => $v)
                        @php 
                            if(in_array($key,$plan->getThemes())){
                                $checked = 'checked';
                            }else{
                                $checked = '';
                            }
                        @endphp
                    <li>
                        <input type="checkbox" id="checkthis{{$loop->index}}" value="{{$key}}" name="themes[]" {{$checked}}/>
                        <label for="checkthis{{$loop->index}}"><img src="{{asset(Storage::url('uploads/card_theme/'.$key.'/color1.png'))}}" /></label>
                    </li>
                   @endforeach
                </ul>
            </div>
            
         
        </div>
        
        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'),['class'=>'form-label']) }}
            {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>'2']) !!}
        </div>
        
    </div>
    <div class="modal-footer p-0 pt-3">
        <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
        <input class="btn btn-primary" type="submit" value="{{ __('Edit') }}">
    </div>
    {{ Form::close() }}
<script>
 $(document).ready(function() {
            $('#enable_branding').trigger('change');
        });
        $(document).on('change', '#enable_branding', function(e) {
            $('.showbranding').hide();
            if ($("#enable_branding").prop('checked') == true) {
                $('.showbranding').show();
            }
        });
</script>