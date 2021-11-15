<div class="row py-2">
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Key_Name') ? 'has-error' : '' }}">
            <label for="Key_Name" class="active font_lable">{{ trans('keys.Key_Name') }}</label>
        
            <div class="form-group">
                <input type="text" style="" name="Key_Name" id="Key_Name" value="{{ old('Key_Name', optional($key)->Key_Name) }}" minlength="1" maxlength="64" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('keys.Key_Name__placeholder') }}" />
                {!! $errors->first('Key_Name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    {{-- <div class="input-field {{ $errors->has('Key_Name') ? 'has-error' : '' }}">
        <label for="Key_Name" class="active">{{ trans('keys.Key_Name') }}</label>
            <input class="validate" name="Key_Name" type="text" id="Key_Name" value="{{ old('Key_Name', optional($key)->Key_Name) }}" minlength="1" maxlength="32" required="true" placeholder="{{ trans('keys.Key_Name__placeholder') }}">
            {!! $errors->first('Key_Name', '<p class="help-block">:message</p>') !!}
    </div> --}}

    @if(Request::path() == 'keys/create' || Auth::user()->is_superuser == 1)
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Employee_ID') ? 'has-error' : '' }}">
            <label for="Employee_ID" class="active font_lable">{{ trans('keys.Employee_ID') }}</label>
        
            <div class="form-group">
                <select class="" id="Employee_ID" name="Employee_ID">
                    <option value="" style="display: none;" {{ old('Employee_ID', optional($key)->Employee_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('keys.Employee_ID__placeholder') }}</option>
                    @foreach ($Employees as $kkkey => $Employee)
                        <option value="{{ $kkkey }}" {{ old('Employee_ID', optional($key)->Employee_ID) == $kkkey ? 'selected' : '' }}>
                            {{ $Employee }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('Employee_ID', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    {{-- <div class="input-field {{ $errors->has('Employee_ID') ? 'has-error' : '' }}">
        <label for="Employee_ID" class="active">{{ trans('keys.Employee_ID') }}</label>
            <select class="" id="Employee_ID" name="Employee_ID">
                    <option value="" style="display: none;" {{ old('Employee_ID', optional($key)->Employee_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('keys.Employee_ID__placeholder') }}</option>
                @foreach ($Employees as $kkkey => $Employee)
                    <option value="{{ $kkkey }}" {{ old('Employee_ID', optional($key)->Employee_ID) == $kkkey ? 'selected' : '' }}>
                        {{ $Employee }}
                    </option>
                @endforeach
            </select>
            
            {!! $errors->first('Employee_ID', '<p class="help-block">:message</p>') !!}
    </div> --}}
    @endif
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
            <label for="Is_Active" class="active font_lable">{{ trans('keyss.Is_Active') }}</label>
            <div class="pt-4 border-bottom pb-2">
                <div class="custom-control custom-checkbox d-inline">
                    <input type="radio" {{ old('Is_Active', optional($key)->Is_Active) == '1' ? 'checked' : '' }} value="1" class="custom-control-input" name="bbbb" id="customCheck1" />
                    <label class="custom-control-label pt-1" for="customCheck1">{{ trans('locale.Yes') }}</label>
                </div>
                <div class="custom-control custom-checkbox d-inline ml-5">
                    <input type="radio" {{ old('Is_Active', optional($key)->Is_Active) != '1' ? 'checked' : '' }} value="0" class="custom-control-input" name="bbbb" id="customCheck2" />
                    <label class="custom-control-label pt-1" for="customCheck2">{{ trans('locale.No') }}</label>
                    <input type="hidden" id="default_value" name="Is_Active" value="0">
                </div>
            </div>
            {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    {{-- <div class="input-field {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
        <label for="Is_Active" class="active">{{ trans('keys.Is_Active') }}</label>
            <div class="mb-5 checkbox">
                    <div class="switch">
                        <label>{{ trans('locale.No') }}<input name="Is_Active" type="checkbox"  {{ old('Is_Active', optional($key)->Is_Active ?: '1') == '1' ? 'checked' : '' }}><span class = "lever"></span>{{ trans('locale.Yes') }}</label>
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
        if (form.name.length > 0) {
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
        }
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
