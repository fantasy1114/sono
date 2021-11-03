<div class="input-field {{ $errors->has('Employee_Name') ? 'has-error' : '' }}">
    <label for="Employee_Name" class="active">{{ trans('employees.Employee_Name') }}</label>
        <input class="validate" name="Employee_Name" type="text" id="Employee_Name" value="{{ old('Employee_Name', optional($employee)->Employee_Name) }}" minlength="4" maxlength="255" required="true" placeholder="{{ trans('employees.Employee_Name__placeholder') }}">
        {!! $errors->first('Employee_Name', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('Employee_Phone') ? 'has-error' : '' }}">
    <label for="Employee_Phone" class="active">{{ trans('employees.Employee_Phone') }}</label>
        <input class="validate" name="Employee_Phone" type="text" id="Employee_Phone" value="{{ old('Employee_Phone', optional($employee)->Employee_Phone) }}" minlength="1" maxlength="50" required="true" placeholder="{{ trans('employees.Employee_Phone__placeholder') }}">
        {!! $errors->first('Employee_Phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
    <label for="Is_Active" class="active">{{ trans('employees.Is_Active') }}</label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label>{{ trans('locale.No') }}<input name="Is_Active" type="checkbox"  {{ old('Is_Active', optional($employee)->Is_Active) == '1' ? 'checked' : '' }}><span class = "lever"></span>{{ trans('locale.Yes') }}</label>
                </div>
        </div>

        {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
</div>
@if(Auth::user()->is_superuser == 1)
<div class="input-field {{ $errors->has('Organisation_ID') ? 'has-error' : '' }}">
    <label for="Organisation_ID" class="active">{{ trans('employees.Organisation_ID') }}</label>
        <select class="" id="Organisation_ID" name="Organisation_ID">
        	    <option value="" style="display: none;" {{ old('Organisation_ID', optional($employee)->Organisation_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('employees.Organisation_ID__placeholder') }}</option>
        	@foreach ($Organisations as $kkkey => $Organisation)
			    <option value="{{ $kkkey }}" {{ old('Organisation_ID', optional($employee)->Organisation_ID) == $kkkey ? 'selected' : '' }}>
			    	{{ $Organisation }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Organisation_ID', '<p class="help-block">:message</p>') !!}
</div>
@endif

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
