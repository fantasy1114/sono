<div class="row edit__add__formpage">
    <div class="col-lg-6 card-width">
        <div class="input-field {{ $errors->has('Organisation_Name') ? 'has-error' : '' }}">
            <label for="Organisation_Name" class="active font_lable">{{ trans('organisations.Organisation_Name') }}</label>
            <div class="form-group">
                <input type="text" style="" name="Organisation_Name" id="Organisation_Name"  value="{{ old('Organisation_Name', optional($organisation)->Organisation_Name) }}" minlength="1" maxlength="64" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('organisations.Organisation_Name__placeholder') }}" />
                <input name="Login_Token" type="hidden" id="Login_Token" value="{{ old('Login_Token', optional($organisation)->Login_Token) }}">
                {!! $errors->first('Organisation_Name', '<p class="help-block">:message</p>') !!}
            </div>
            
        </div>
    </div>
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
    $('#customCheck1').on('click', function(e){
        console.log('1');
        $('#default_value').val('1');
    });
    $('#customCheck2').on('click', function(e){
        $('#default_value').val('0');
        console.log('0');
    });
</script>
