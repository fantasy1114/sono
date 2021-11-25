<!-- Customized by Yuris -->
<div class="row edit__add__formpage">
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="active font_lable">{{ trans('managers.name') }}</label>
            <div class="form-group">
                <input type="text" name="name" id="name" value="{{ old('name', optional($manager)->name) }}" minlength="1" maxlength="255" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('managers.name__placeholder') }}" />
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email" class="active font_lable">{{ trans('managers.email') }}</label>
            <div class="form-group">
                <input type="email" name="email" id="email" value="{{ old('email', optional($manager)->email) }}" minlength="1" maxlength="255" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('managers.email__placeholder') }}" />
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('organisation_id') ? 'has-error' : '' }}">
            <label for="organisation_id" class="active font_lable">{{ trans('managers.organisation_id') }}</label>
            <select class="" id="organisation_id" name="organisation_id">
                <option value="" style="display: none;" {{ old('organisation_id', optional($manager)->organisation_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('managers.organisation_id__placeholder') }}</option>
                @foreach ($Organisations as $kkkey => $Organisation)
                    <option value="{{ $kkkey }}" {{ old('organisation_id', optional($manager)->organisation_id) == $kkkey ? 'selected' : '' }}>
                        {{ $Organisation }}
                    </option>
                @endforeach
            </select>
        
            {!! $errors->first('organisation_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password" class="active font_lable">{{ trans('managers.password') }}</label>
            <div class="form-group">
                <input type="password" style="" name="password" id="password" value="{{ old('password', optional($manager)->password) }}" minlength="1" maxlength="255" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('managers.password__placeholder') }}" autocomplete="new-password"/>
                <input class="" name="ptkn" type="hidden" id="ptkn" value="{{ optional($manager)->password }}">
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('phone') ? 'has-error' : '' }}">
            <label for="phone" class="active font_lable">{{ trans('managers.phone') }}</label>
            <div class="form-group">
                <input type="phone" style="" name="phone" id="phone" value="{{ old('phone', optional($manager)->phone) }}" minlength="1" maxlength="255" required="true" class="form-control pl-0 placeholder_font validate" placeholder="{{ trans('managers.phone__placeholder') }}" autocomplete="new-phone"/>
                
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
   
    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('is_superuser') ? 'has-error' : '' }}">
            <label for="is_superuser" class="active font_lable">{{ trans('managers.is_superuser') }}</label>
            <div class="pt-4 border-bottom pb-2">
                <div class="custom-control custom-checkbox d-inline">
                    <input type="radio" {{ old('is_superuser', optional($manager)->is_superuser) == '1' ? 'checked' : '' }} value="1" class="custom-control-input" name="bbbb" id="customCheck1" />
                    <label class="custom-control-label pt-1" for="customCheck1">{{ trans('locale.Yes') }}</label>
                </div>
                <div class="custom-control custom-checkbox d-inline ml-5">
                    <input type="radio" {{ old('is_superuser', optional($manager)->is_superuser) != '1' ? 'checked' : '' }} value="0" class="custom-control-input" name="bbbb" id="customCheck2" />
                    <label class="custom-control-label pt-1" for="customCheck2">{{ trans('locale.No') }}</label>
                    <input type="hidden" id="default_value" name="is_superuser" value="0">
                </div>
            </div>
    
            {!! $errors->first('is_superuser', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-md-6 card-width">
        <div class="input-field {{ $errors->has('is_active') ? 'has-error' : '' }}">
            <label for="is_active" class="active font_lable">{{ trans('managers.is_active') }}</label>
            <div class="pt-4 border-bottom pb-2">
                <div class="custom-control custom-checkbox d-inline">
                    <input type="radio" {{ old('is_active', optional($manager)->is_active) == '1' ? 'checked' : '' }} value="1" class="custom-control-input" name="aaa" id="customCheck3" />
                    <label class="custom-control-label pt-1" for="customCheck3">{{ trans('locale.Yes') }}</label>
                </div>
                <div class="custom-control custom-checkbox d-inline ml-5">
                    <input type="radio" {{ old('is_active', optional($manager)->is_active) != '1' ? 'checked' : '' }} value="0" class="custom-control-input" name="aaa" id="customCheck4" />
                    <label class="custom-control-label pt-1" for="customCheck4">{{ trans('locale.No') }}</label>
                    <input type="hidden" id="is_active_value" name="is_active" value="0">
                </div>
            </div>
    
            {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

</div>

<script>
    // Script Added by Yuris
    // Adds listener to all defined forms that convert checkbox values from on/off to 1/0
    var forms = document.forms;
    //alert(forms.length);
    for (var f = 0, form; form = forms[f++];) {
        //if (form.name.length > 0) {
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
        //}
    };
    $('#customCheck1').on('click', function(e){
        console.log('1');
        $('#default_value').val('1');
    });
    $('#customCheck2').on('click', function(e){
        $('#default_value').val('0');
        console.log('0');
    });
    $('#customCheck3').on('click', function(e){
        $('#is_active_value').val('1');
        console.log('1');
    });
    $('#customCheck4').on('click', function(e){
        $('#is_active_value').val('0');
        console.log('0');
    });
</script>
