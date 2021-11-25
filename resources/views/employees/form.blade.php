<div class="row edit__add__formpage">
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Employee_Name') ? 'has-error' : '' }}">
            <label for="Employee_Name" class="active font_lable">{{ trans('employees.Employee_Name') }}</label>
        
            <div class="form-group">
                <input type="text" style="" name="Employee_Name" id="Employee_Name" value="{{ old('Employee_Name', optional($employee)->Employee_Name) }}" minlength="1" maxlength="64" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('employees.Employee_Name__placeholder') }}" />
                {!! $errors->first('Employee_Name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Employee_Phone') ? 'has-error' : '' }}">
            <label for="Employee_Phone" class="active font_lable">{{ trans('employees.Employee_Phone') }}</label>
        
            <div class="form-group">
                <input type="text" style="" name="Employee_Phone" id="Employee_Phone" value="{{ old('Employee_Phone', optional($employee)->Employee_Phone) }}" minlength="1" maxlength="64" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('employees.Employee_Phone__placeholder') }}" />
                {!! $errors->first('Employee_Phone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Is_Active') ? 'has-error' : '' }}">
            <label for="Is_Active" class="active font_lable">{{ trans('employees.Is_Active') }}</label>
                <div class="border-bottom" style="padding: 10px 0px;">
                    <div class="custom-control custom-checkbox d-inline">
                        <input type="radio" {{ old('Is_Active', optional($employee)->Is_Active) == '1' ? 'checked' : '' }} value="1" class="custom-control-input" name="bbbb" id="customCheck1" />
                        <label class="custom-control-label pt-1" for="customCheck1">{{ trans('locale.Yes') }}</label>
                    </div>
                    <div class="custom-control custom-checkbox d-inline ml-5">
                        <input type="radio" {{ old('Is_Active', optional($employee)->Is_Active) != '1' ? 'checked' : '' }} value="0" class="custom-control-input" name="bbbb" id="customCheck2" />
                        <label class="custom-control-label pt-1" for="customCheck2">{{ trans('locale.No') }}</label>
                        <input type="hidden" id="default_value" name="Is_Active" value="0">
                    </div>
                </div>
                {!! $errors->first('Is_Active', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
   
    @if(Auth::user()->is_superuser == 1)
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('Organisation_ID') ? 'has-error' : '' }}">
            <label for="Organisation_ID" class="active font_lable">{{ trans('employees.Organisation_ID') }}</label>
        
            <div class="form-group">
                <select class="" id="Organisation_ID" name="Organisation_ID">
                    <option value="" style="display: none;" {{ old('Organisation_ID', optional($employee)->Organisation_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('employees.Organisation_ID__placeholder') }}</option>
                    @foreach ($Organisations as $kkkey => $Organisation)
                        <option value="{{ $kkkey }}" {{ old('Organisation_ID', optional($employee)->Organisation_ID) == $kkkey ? 'selected' : '' }}>
                            {{ $Organisation }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('Organisation_ID', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    @endif
 
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
