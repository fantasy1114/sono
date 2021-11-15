<div class="row py-2">
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Tracker_Code') ? 'has-error' : '' }}">
            <label for="Tracker_Code" class="active font_lable">{{ trans('devices.Tracker_Code') }}</label>
        
            <div class="form-group">
                <input type="text" style="" name="Tracker_Code" id="Tracker_Code" value="{{ old('Tracker_Code', optional($device)->Tracker_Code) }}" minlength="15" maxlength="25" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('devices.Tracker_Code__placeholder') }}" />
                {!! $errors->first('Tracker_Code', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Worksite_ID') ? 'has-error' : '' }}">
            <label for="Worksite_ID" class="active font_lable">{{ trans('devices.Worksite_ID') }}</label>
            <select class="" id="Worksite_ID" name="Worksite_ID">
                    <option value="" style="display: none;" {{ old('Worksite_ID', optional($device)->Worksite_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('devices.Worksite_ID__placeholder') }}</option>
                @foreach ($Worksites as $kkkey => $Worksite)
                    <option value="{{ $kkkey }}" {{ old('Worksite_ID', optional($device)->Worksite_ID) == $kkkey ? 'selected' : '' }}>
                        {{ $Worksite }}
                    </option>
                @endforeach
            </select>
            
            {!! $errors->first('Worksite_ID', '<p class="help-block">:message</p>') !!}
           
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
            <label for="Is_Active" class="active font_lable">{{ trans('devices.Is_Active') }}</label>
            <div class="pt-4 border-bottom pb-2">
                <div class="custom-control custom-checkbox d-inline">
                    <input type="radio" {{ old('Is_Active', optional($device)->Is_Active) == '1' ? 'checked' : '' }} value="1" class="custom-control-input" name="bbbb" id="customCheck1" />
                    <label class="custom-control-label pt-1" for="customCheck1">{{ trans('locale.Yes') }}</label>
                </div>
                <div class="custom-control custom-checkbox d-inline ml-5">
                    <input type="radio" {{ old('Is_Active', optional($device)->Is_Active) != '1' ? 'checked' : '' }} value="0" class="custom-control-input" name="bbbb" id="customCheck2" />
                    <label class="custom-control-label pt-1" for="customCheck2">{{ trans('locale.No') }}</label>
                    <input type="hidden" id="default_value" name="Is_Active" value="0">
                </div>
            </div>
          
            {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    {{-- <div class="input-field {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
        <label for="Is_Active" class="active">{{ trans('devices.Is_Active') }}</label>
            <div class="mb-5 checkbox">
                    <div class="switch">
                        <label>{{ trans('locale.No') }}<input name="Is_Active" type="checkbox"  {{ old('Is_Active', optional($device)->Is_Active ?: '1') == '1' ? 'checked' : '' }}><span class = "lever"></span>{{ trans('locale.Yes') }}</label>
                    </div>
            </div>

            {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
    </div> --}}
</div>

<script>
    // Script Added by Yuris
    // Adds listener to all defined forms that convert checkbox values from on/off to 1/0
    var forms = document.forms;
    //alert(forms.length);
    for (var f = 0, form; form = forms[f++];) {
        //if (form.name.length > 0) {
            //alert(form.name);
            form.addEventListener("submit", function() {
                var elements = this.elements;
                for (var i = 0, element; element = elements[i++];) {
                    if (element.type === 'checkbox' ) {
                        //alert(element.name);
                        if (element.value == 'on') element.value = 1;
                        if (element.value == 'off') element.value = 0;
                    }
                }
            })
        //}
    };
    $('#customCheck1').on('click', function(e){
        console.log('1');
        $('#default_value').val('1');
    });
    $('#customCheck2').on('click', function(e){
        $('#default_value').val('0');
        console.log('0');
    });
</script>
