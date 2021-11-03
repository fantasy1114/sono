
<div class="form-group {{ $errors->has('Organisation_Name') ? 'has-error' : '' }}">
    <label for="Organisation_Name" class="col-md-2 control-label">{{ trans('organisations.Organisation_Name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Organisation_Name" type="text" id="Organisation_Name" value="{{ old('Organisation_Name', optional($organisation)->Organisation_Name) }}" minlength="1" maxlength="64" required="true" placeholder="{{ trans('organisations.Organisation_Name__placeholder') }}">
        {!! $errors->first('Organisation_Name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

