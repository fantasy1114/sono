<div class="input-field {{ $errors->has('Worksite_Name') ? 'has-error' : '' }}">
    <label for="Worksite_Name" class="active">{{ trans('worksites.Worksite_Name') }}</label>
        <input class="validate" name="Worksite_Name" type="text" id="Worksite_Name" value="{{ old('Worksite_Name', optional($worksite)->Worksite_Name) }}" minlength="1" maxlength="64" required="true" placeholder="{{ trans('worksites.Worksite_Name__placeholder') }}">
        {!! $errors->first('Worksite_Name', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('Worksite_Address') ? 'has-error' : '' }}">
    <label for="Worksite_Address" class="active">{{ trans('worksites.Worksite_Address') }}</label>
        <input class="validate" name="Worksite_Address" type="text" id="Worksite_Address" value="{{ old('Worksite_Address', optional($worksite)->Worksite_Address) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('worksites.Worksite_Address__placeholder') }}">
        {!! $errors->first('Worksite_Address', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
    <label for="Is_Active" class="active">{{ trans('worksites.Is_Active') }}</label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label>{{ trans('locale.No') }}<input name="Is_Active" type="checkbox"  {{ old('Is_Active', optional($worksite)->Is_Active) == '1' ? 'checked' : '' }}><span class = "lever"></span>{{ trans('locale.Yes') }}</label>
                </div>
        </div>

        {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
</div>
@if(Auth::user()->is_superuser == 1)
<div class="input-field {{ $errors->has('Organisation_ID') ? 'has-error' : '' }}">
    <label for="Organisation_ID" class="active">{{ trans('worksites.Organisation_ID') }}</label>
        <select class="" id="Organisation_ID" name="Organisation_ID" >
        	    <option value="" style="display: none;" {{ old('Organisation_ID', optional($worksite)->Organisation_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('worksites.Organisation_ID__placeholder') }}</option>
        	@foreach ($Organisations as $kkkey => $Organisation)
			    <option value="{{ $kkkey }}" {{ old('Organisation_ID', optional($worksite)->Organisation_ID) == $kkkey ? 'selected' : '' }}>
			    	{{ $Organisation }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Organisation_ID', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="input-field {{ $errors->has('Date_From') ? 'has-error' : '' }}">
    <label for="Date_From" class="active">{{ trans('worksites.Date_From') }}</label>
        <input class="validate" name="Date_From" type="text" id="Date_From" value="{{ old('Date_From', optional($worksite)->Date_From) }}" placeholder="{{ trans('worksites.Date_From__placeholder') }}">
        {!! $errors->first('Date_From', '<p class="help-block">:message</p>') !!}
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
