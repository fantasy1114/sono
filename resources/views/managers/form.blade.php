<!-- Customized by Yuris -->

<div class="input-field {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="active">{{ trans('managers.name') }}</label>
        <input class="validate" name="name" type="text" id="name" value="{{ old('name', optional($manager)->name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('managers.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="active">{{ trans('managers.email') }}</label>
        <input class="validate" name="email" type="email" id="email" value="{{ old('email', optional($manager)->email) }}" 
            required="true" placeholder="{{ trans('managers.email__placeholder') }}" autocomplete="new-email">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('organisation_id') ? 'has-error' : '' }}">
    <label for="organisation_id" class="active">{{ trans('managers.organisation_id') }}</label>
        <select class="" id="organisation_id" name="organisation_id">
        	    <option value="" style="display: none;" {{ old('organisation_id', optional($manager)->organisation_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('managers.organisation_id__placeholder') }}</option>
        	@foreach ($Organisations as $kkkey => $Organisation)
			    <option value="{{ $kkkey }}" {{ old('organisation_id', optional($manager)->organisation_id) == $kkkey ? 'selected' : '' }}>
			    	{{ $Organisation }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('organisation_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="active">{{ trans('managers.password') }}</label>
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($manager)->password) }}" 
            required="true" placeholder="{{ trans('managers.password__placeholder') }}" autocomplete="new-password">
        <input class="" name="ptkn" type="hidden" id="ptkn" value="{{ optional($manager)->password }}">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="active">{{ trans('managers.phone') }}</label>
        <input class="validate" name="phone" type="text" id="phone" value="{{ old('phone', optional($manager)->phone) }}" maxlength="255" placeholder="{{ trans('managers.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('is_superuser') ? 'has-error' : '' }}">
    <label for="is_superuser" class="active">{{ trans('managers.is_superuser') }}</label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label>{{ trans('locale.No') }}<input name="is_superuser" type="checkbox"  {{ old('is_superuser', optional($manager)->is_superuser) == '1' ? 'checked' : '' }}><span class = "lever"></span>{{ trans('locale.Yes') }}</label>
                </div>
        </div>

        {!! $errors->first('is_superuser', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('is_active') ? 'has-error' : '' }}">
    <label for="is_active" class="active">{{ trans('managers.is_active') }}</label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label>{{ trans('locale.No') }}<input name="is_active" type="checkbox"  {{ old('is_active', optional($manager)->is_active) == '0' ? '' : 'checked' }}><span class = "lever"></span>{{ trans('locale.Yes') }}</label>
                </div>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
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
</script>
