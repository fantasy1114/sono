
<div class="form-group {{ $errors->has('Key_Name') ? 'has-error' : '' }}">
    <label for="Key_Name" class="col-md-2 control-label">{{ trans('registries.Key_Name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Key_Name" type="text" id="Key_Name" value="{{ old('Key_Name', optional($registry)->Key_Name) }}" minlength="1" maxlength="32" required="true" placeholder="{{ trans('registries.Key_Name__placeholder') }}">
        {!! $errors->first('Key_Name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Action') ? 'has-error' : '' }}">
    <label for="Action" class="col-md-2 control-label">{{ trans('registries.Action') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Action" type="number" id="Action" value="{{ old('Action', optional($registry)->Action) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('registries.Action__placeholder') }}">
        {!! $errors->first('Action', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Action_Time') ? 'has-error' : '' }}">
    <label for="Action_Time" class="col-md-2 control-label">{{ trans('registries.Action_Time') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Action_Time" type="text" id="Action_Time" value="{{ old('Action_Time', optional($registry)->Action_Time) }}" required="true" placeholder="{{ trans('registries.Action_Time__placeholder') }}">
        {!! $errors->first('Action_Time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Battery_State') ? 'has-error' : '' }}">
    <label for="Battery_State" class="col-md-2 control-label">{{ trans('registries.Battery_State') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Battery_State" type="number" id="Battery_State" value="{{ old('Battery_State', optional($registry)->Battery_State) }}" min="-99999999" max="99999999" required="true" placeholder="{{ trans('registries.Battery_State__placeholder') }}" step="any">
        {!! $errors->first('Battery_State', '<p class="help-block">:message</p>') !!}
    </div>
</div>

