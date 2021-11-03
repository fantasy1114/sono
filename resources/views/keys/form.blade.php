<div class="input-field {{ $errors->has('Key_Name') ? 'has-error' : '' }}">
    <label for="Key_Name" class="active">{{ trans('keys.Key_Name') }}</label>
        <input class="validate" name="Key_Name" type="text" id="Key_Name" value="{{ old('Key_Name', optional($key)->Key_Name) }}" minlength="1" maxlength="32" required="true" placeholder="{{ trans('keys.Key_Name__placeholder') }}">
        {!! $errors->first('Key_Name', '<p class="help-block">:message</p>') !!}
</div>

@if(Request::path() == 'keys/create' || Auth::user()->is_superuser == 1)
<div class="input-field {{ $errors->has('Employee_ID') ? 'has-error' : '' }}">
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
</div>
@endif
<div class="input-field {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
    <label for="Is_Active" class="active">{{ trans('keys.Is_Active') }}</label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label>{{ trans('locale.No') }}<input name="Is_Active" type="checkbox"  {{ old('Is_Active', optional($key)->Is_Active ?: '1') == '1' ? 'checked' : '' }}><span class = "lever"></span>{{ trans('locale.Yes') }}</label>
                </div>
        </div>

        {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
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
</script>
