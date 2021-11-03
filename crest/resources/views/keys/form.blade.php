
<div class="form-group {{ $errors->has('Key_Name') ? 'has-error' : '' }}">
    <label for="Key_Name" class="col-md-2 control-label">{{ trans('keys.Key_Name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Key_Name" type="text" id="Key_Name" value="{{ old('Key_Name', optional($key)->Key_Name) }}" minlength="1" maxlength="32" required="true" placeholder="{{ trans('keys.Key_Name__placeholder') }}">
        {!! $errors->first('Key_Name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Employee_ID') ? 'has-error' : '' }}">
    <label for="Employee_ID" class="col-md-2 control-label">{{ trans('keys.Employee_ID') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Employee_ID" name="Employee_ID">
        	    <option value="" style="display: none;" {{ old('Employee_ID', optional($key)->Employee_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('keys.Employee_ID__placeholder') }}</option>
        	@foreach ($Employees as $key => $Employee)
			    <option value="{{ $key }}" {{ old('Employee_ID', optional($key)->Employee_ID) == $key ? 'selected' : '' }}>
			    	{{ $Employee }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Employee_ID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
    <label for="Is_Active" class="col-md-2 control-label">{{ trans('keys.Is_Active') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="Is_Active_1">
            	<input id="Is_Active_1" class="" name="Is_Active" type="checkbox" value="1" {{ old('Is_Active', optional($key)->Is_Active ?: '1') == '1' ? 'checked' : '' }}>
                {{ trans('keys.Is_Active_1') }}
            </label>
        </div>

        {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

