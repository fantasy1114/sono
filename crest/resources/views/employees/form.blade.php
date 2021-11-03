
<div class="form-group {{ $errors->has('Employee_Name') ? 'has-error' : '' }}">
    <label for="Employee_Name" class="col-md-2 control-label">{{ trans('employees.Employee_Name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Employee_Name" type="text" id="Employee_Name" value="{{ old('Employee_Name', optional($employee)->Employee_Name) }}" minlength="4" maxlength="255" required="true" placeholder="{{ trans('employees.Employee_Name__placeholder') }}">
        {!! $errors->first('Employee_Name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Employee_Phone') ? 'has-error' : '' }}">
    <label for="Employee_Phone" class="col-md-2 control-label">{{ trans('employees.Employee_Phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Employee_Phone" type="text" id="Employee_Phone" value="{{ old('Employee_Phone', optional($employee)->Employee_Phone) }}" minlength="1" maxlength="50" required="true" placeholder="{{ trans('employees.Employee_Phone__placeholder') }}">
        {!! $errors->first('Employee_Phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
    <label for="Is_Active" class="col-md-2 control-label">{{ trans('employees.Is_Active') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="Is_Active_1">
            	<input id="Is_Active_1" class="" name="Is_Active" type="checkbox" value="1" {{ old('Is_Active', optional($employee)->Is_Active ?: '1') == '1' ? 'checked' : '' }}>
                {{ trans('employees.Is_Active_1') }}
            </label>
        </div>

        {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Organisation_ID') ? 'has-error' : '' }}">
    <label for="Organisation_ID" class="col-md-2 control-label">{{ trans('employees.Organisation_ID') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Organisation_ID" name="Organisation_ID">
        	    <option value="" style="display: none;" {{ old('Organisation_ID', optional($employee)->Organisation_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('employees.Organisation_ID__placeholder') }}</option>
        	@foreach ($Organisations as $key => $Organisation)
			    <option value="{{ $key }}" {{ old('Organisation_ID', optional($employee)->Organisation_ID) == $key ? 'selected' : '' }}>
			    	{{ $Organisation }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Organisation_ID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

