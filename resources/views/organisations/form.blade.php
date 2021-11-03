<div class="input-field {{ $errors->has('Organisation_Name') ? 'has-error' : '' }}">
    <label for="Organisation_Name" class="active">{{ trans('organisations.Organisation_Name') }}</label>
        <input class="validate" name="Organisation_Name" type="text" id="Organisation_Name" value="{{ old('Organisation_Name', optional($organisation)->Organisation_Name) }}" minlength="1" maxlength="64" required="true" placeholder="{{ trans('organisations.Organisation_Name__placeholder') }}">
        <input name="Login_Token" type="hidden" id="Login_Token" value="{{ old('Login_Token', optional($organisation)->Login_Token) }}">
        {!! $errors->first('Organisation_Name', '<p class="help-block">:message</p>') !!}
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
