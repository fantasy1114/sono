
<div class="form-group {{ $errors->has('Worksite_Name') ? 'has-error' : '' }}">
    <label for="Worksite_Name" class="col-md-2 control-label">{{ trans('worksites.Worksite_Name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Worksite_Name" type="text" id="Worksite_Name" value="{{ old('Worksite_Name', optional($worksite)->Worksite_Name) }}" minlength="1" maxlength="64" required="true" placeholder="{{ trans('worksites.Worksite_Name__placeholder') }}">
        {!! $errors->first('Worksite_Name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Worksite_Address') ? 'has-error' : '' }}">
    <label for="Worksite_Address" class="col-md-2 control-label">{{ trans('worksites.Worksite_Address') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Worksite_Address" type="text" id="Worksite_Address" value="{{ old('Worksite_Address', optional($worksite)->Worksite_Address) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('worksites.Worksite_Address__placeholder') }}">
        {!! $errors->first('Worksite_Address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
    <label for="Is_Active" class="col-md-2 control-label">{{ trans('worksites.Is_Active') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="Is_Active_1">
            	<input id="Is_Active_1" class="" name="Is_Active" type="checkbox" value="1" {{ old('Is_Active', optional($worksite)->Is_Active) == '1' ? 'checked' : '' }}>
                {{ trans('worksites.Is_Active_1') }}
            </label>
        </div>

        {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Organisation_ID') ? 'has-error' : '' }}">
    <label for="Organisation_ID" class="col-md-2 control-label">{{ trans('worksites.Organisation_ID') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Organisation_ID" name="Organisation_ID">
        	    <option value="" style="display: none;" {{ old('Organisation_ID', optional($worksite)->Organisation_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('worksites.Organisation_ID__placeholder') }}</option>
        	@foreach ($Organisations as $key => $Organisation)
			    <option value="{{ $key }}" {{ old('Organisation_ID', optional($worksite)->Organisation_ID) == $key ? 'selected' : '' }}>
			    	{{ $Organisation }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Organisation_ID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

