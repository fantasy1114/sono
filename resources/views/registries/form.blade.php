<div class="input-field {{ $errors->has('Key_Name') ? 'has-error' : '' }}">
    <label for="Key_Name" class="active">{{ trans('registries.Key_Name') }}</label>
        <input class="validate" name="Key_Name" type="text" id="Key_Name" value="{{ old('Key_Name', optional($registry)->Key_Name) }}" minlength="1" maxlength="32" required="true" placeholder="{{ trans('registries.Key_Name__placeholder') }}">
        {!! $errors->first('Key_Name', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('Action') ? 'has-error' : '' }}">
    <label for="Action" class="active">{{ trans('registries.Action') }}</label>
        <input class="validate" name="Action" type="number" id="Action" value="{{ old('Action', optional($registry)->Action) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('registries.Action__placeholder') }}">
        {!! $errors->first('Action', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('Action_Time') ? 'has-error' : '' }}">
    <label for="Action_Time" class="active">{{ trans('registries.Action_Time') }}</label>
        <input class="validate" name="Action_Time" type="text" id="Action_Time" value="{{ old('Action_Time', optional($registry)->Action_Time) }}" required="true" placeholder="{{ trans('registries.Action_Time__placeholder') }}">
        {!! $errors->first('Action_Time', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-field {{ $errors->has('Battery_State') ? 'has-error' : '' }}">
    <label for="Battery_State" class="active">{{ trans('registries.Battery_State') }}</label>
        <input class="validate" name="Battery_State" type="number" id="Battery_State" value="{{ old('Battery_State', optional($registry)->Battery_State) }}" min="-99999999" max="99999999" required="true" placeholder="{{ trans('registries.Battery_State__placeholder') }}" step="any">
        {!! $errors->first('Battery_State', '<p class="help-block">:message</p>') !!}
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
