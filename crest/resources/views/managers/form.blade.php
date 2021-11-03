
<div class="form-group {{ $errors->has('Manager_Name') ? 'has-error' : '' }}">
    <label for="Manager_Name" class="col-md-2 control-label">{{ trans('managers.Manager_Name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Manager_Name" type="text" id="Manager_Name" value="{{ old('Manager_Name', optional($manager)->Manager_Name) }}" minlength="4" maxlength="255" required="true" placeholder="{{ trans('managers.Manager_Name__placeholder') }}">
        {!! $errors->first('Manager_Name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Manager_Email') ? 'has-error' : '' }}">
    <label for="Manager_Email" class="col-md-2 control-label">{{ trans('managers.Manager_Email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Manager_Email" type="text" id="Manager_Email" value="{{ old('Manager_Email', optional($manager)->Manager_Email) }}" minlength="4" maxlength="64" required="true" placeholder="{{ trans('managers.Manager_Email__placeholder') }}">
        {!! $errors->first('Manager_Email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Manager_Phone') ? 'has-error' : '' }}">
    <label for="Manager_Phone" class="col-md-2 control-label">{{ trans('managers.Manager_Phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Manager_Phone" type="text" id="Manager_Phone" value="{{ old('Manager_Phone', optional($manager)->Manager_Phone) }}" minlength="4" maxlength="64" required="true" placeholder="{{ trans('managers.Manager_Phone__placeholder') }}">
        {!! $errors->first('Manager_Phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
    <label for="Is_Active" class="col-md-2 control-label">{{ trans('managers.Is_Active') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="Is_Active_1">
            	<input id="Is_Active_1" class="" name="Is_Active" type="checkbox" value="1" {{ old('Is_Active', optional($manager)->Is_Active ?: '1') == '1' ? 'checked' : '' }}>
                {{ trans('managers.Is_Active_1') }}
            </label>
        </div>

        {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Organisation_ID') ? 'has-error' : '' }}">
    <label for="Organisation_ID" class="col-md-2 control-label">{{ trans('managers.Organisation_ID') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Organisation_ID" name="Organisation_ID">
        	    <option value="" style="display: none;" {{ old('Organisation_ID', optional($manager)->Organisation_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('managers.Organisation_ID__placeholder') }}</option>
        	@foreach ($Organisations as $key => $Organisation)
			    <option value="{{ $key }}" {{ old('Organisation_ID', optional($manager)->Organisation_ID) == $key ? 'selected' : '' }}>
			    	{{ $Organisation }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Organisation_ID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Manager_Password') ? 'has-error' : '' }}">
    <label for="Manager_Password" class="col-md-2 control-label">{{ trans('managers.Manager_Password') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Manager_Password" type="text" id="Manager_Password" value="{{ old('Manager_Password', optional($manager)->Manager_Password ?: '') }}" minlength="4" maxlength="128" required="true" placeholder="{{ trans('managers.Manager_Password__placeholder') }}">
        {!! $errors->first('Manager_Password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

